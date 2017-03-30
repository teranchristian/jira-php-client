<?php
namespace Jira\Service;

use Jira\Client;

abstract class Base
{
    protected $api;

    public function __construct(Client $api)
    {
        $this->api = $api;
    }

    protected abstract function basePath();
}
