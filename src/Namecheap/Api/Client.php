<?php

namespace Nobilecode\NamecheapClient\Namecheap\Api;

use App\Http\Controllers\Controller;

class Client extends Controller
{

        protected $_url;
        protected $_apiUser;
        protected $_apiKey;
        protected $_ip;

        public function __construct($username, $apiKey, $ip, $sandbox = false)
            {

                $this->_username = $username;
                $this->_apiUser = $username;
                $this->_apiKey = $apiKey;
                $this->_ip = $ip;

                if ($sandbox) {
                    $this->_url = 'https://api.sandbox.namecheap.com/xml.response';
                } else {
                    $this->_url = 'https://api.namecheap.com/xml.response';
                }
            }

        public function send($command, $params = array())
            {
                $command = strtolower($command);
                $params['ApiUser'] = $params['UserName'] = $this->_apiUser;
                $params['ApiKey'] = $this->_apiKey;
                $params['ClientIP'] = $this->_ip;
                $params['Command'] = $command;

                $this->request = array(
                    'url' => $this->url,
                    'params' => $params
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                $response = curl_exec($ch);
                curl_close($ch);

                return new Response($response);
            }

        public function getAllDomains($type = 'all', $page = 1, $pagesize = 100, $sort = 'NAME', $search = '')
        {
            $domains = array();

            # get response
            $response = $this->getResponse('namecheap.domains.getList',array('ListType' => $type, 'SearchTerm' => $search, 'Page' => $page, 'PageSize' => $pagesize, 'SortBy' => $sort));
            if($response != null)
            {
                foreach ($response->DomainGetListResult->Domain as $domain)
                {
                    $temp = array();

                    foreach ($domain->attributes() as $key => $value)
                    {
                        $temp[$key] = (string) $value;
                    }

                    $domains[] = $temp;
                }
            }

            return $domains;
        }

        public function setDomainRecords($domain,$records)
        {

            list($records['SLD'], $records['TLD'] ) = explode('.', $domain);
            $response = $this->getResponse('namecheap.domains.dns.setHosts',$records);
            if($response != null)
            {
                if(strtolower($response->DomainDNSSetHostsResult->attributes()->IsSuccess) == 'true')
                {
                    return true;
                }
            }

            return false;
        }

}
