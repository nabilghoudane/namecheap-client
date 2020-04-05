<?php

namespace Nobilecode\NamecheapClient\Namecheap\Api\Domains;

use Nobilecode\NamecheapClient\Namecheap\Api\Namecheap;

class Dns extends Namecheap
{
    private $namespace = 'namecheap.domains.dns.';

    /**
     * Sets domain to use our default DNS servers.
     */
    public function setDefault(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Sets domain to use custom DNS servers.
     */
    public function setCustom(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Gets a list of DNS servers associated with the requested domain
     */
    public function getList(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Retrieves DNS host record settings for the requested domain
     */
    public function getHosts(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Sets DNS host records settings for the requested domain.
     */
    public function setHosts(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Gets email forwarding settings for the requested domain
     */
    public function getEmailForwarding(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Sets email forwarding for a domain name
     */
    public function setEmailForwarding(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }
}
