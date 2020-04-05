<?php

namespace Nobilecode\NamecheapClient\Namecheap\Api;

abstract class Namecheap
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}
}
