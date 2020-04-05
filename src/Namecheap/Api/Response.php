<?php

namespace Nobilecode\NamecheapClient\Namecheap\Api;


use App\Http\Controllers\Controller;
use Exception;

class Response extends Controller
{

    private $raw;

    private $xml;

    public function __construct($response)
    {
        $this->raw = $response;

        try {
            $this->xml = new \SimpleXMLElement($this->raw);
        } catch (Exception $e) {
            echo $e;
        }
    }


    public function data() {
        if ($this->xml && $this->xml instanceof \SimpleXMLElement) {
            return $this->xmlToArray($this->xml->CommandResponse);
        }
        return null;
    }


    public function getStatus()
    {
        if ($this->xml && $this->xml instanceof \SimpleXMLElement) {
            return (string) $this->xml->attributes()->Status;
        }
        return null;
    }


    public function getErrors()
    {
        if ($this->xml && $this->xml instanceof \SimpleXMLElement) {
            return $this->xmlToArray($this->xml->Errors);
        }

        return null;
    }

    public function getWarnings()
    {
        if ($this->xml && $this->xml instanceof \SimpleXMLElement) {
            return $this->xmlToArray($this->xml->Warnings);
        }
        return false;
    }


    public function getXml()
    {
        return $this->xml;
    }


    public function getRaw()
    {
        return $this->raw;
    }


    private function xmlToArray($data)
    {
        $array = (array) $data;

        foreach ($array as $key => $item) {

            if ($item instanceof \SimpleXMLElement) {

                if (count((array) $item) > 0) {
                    $array[$key] = $this->xmlToArray($item);
                } elseif ((string) $item) {
                    $array[$key] = (string) $item;
                } else {
                    $array[$key] = null;
                }

            } elseif (is_array($item)) {

                $array[$key] = $this->xmlToArray($item);
            }
        }

        if (isset($array['@attributes'])) {

            foreach ($array['@attributes'] as $key => $value) {

                $array[$key] = $value;
            }
            unset($array['@attributes']);
        }

        return $array;
    }
}
