<?php
require_once __DIR__.'/../vendor/autoload.php';

define('JIRACLI_PATH', __DIR__); 

use Jira\Client;
$client = new Client($hostJira, $user , $password);
