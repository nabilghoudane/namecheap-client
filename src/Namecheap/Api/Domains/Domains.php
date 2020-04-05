<?php

namespace Nobilecode\NamecheapClient\Namecheap\Api\Domains;

use Nobilecode\NamecheapClient\Namecheap\Api\Namecheap;

class Domains extends Namecheap
{

    private $namespace = 'namecheap.domains.';

    /**
     * Returns a list of domains
     */
    public function getList(array $params = array())
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Returns a list of tlds
     */
    public function getTldList()
    {
        return $this->client->send($this->namespace.__FUNCTION__);
    }

    /**
     * Registers a new domain name
     */
    public function create(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Gets contact information for the requested domain
     */
    public function getContacts(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Sets contact information for the requested domain
     */
    public function setContacts(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Checks the availability of a domain name
     */
    public function check(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Reactivates an expired domain
     */
    public function reactivate(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Renews an expiring domain
     */
    public function renew(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Gets the RegistrarLock status for the requested domain
     */
    public function getRegistrarLock(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     * Sets the RegistrarLock status for a domain
     */
    public function setRegistrarLock(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }

    /**
     *  Returns information about the requested domain.
     */
    public function getInfo(array $params)
    {
        return $this->client->send($this->namespace.__FUNCTION__, $params);
    }
}
