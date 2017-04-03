<?php
require_once __DIR__.'/../vendor/autoload.php';

define('JIRACLI_PATH', __DIR__); 

use Jira\Client;

$configFile = __DIR__.'/../config/config.ini';

if (!file_exists($configFile)) {
    die("Unknown config file $configFile\n");
}

$config = parse_ini_file($configFile, true);
$jiraConfig = $config['Jira'];
$hostJira = $jiraConfig['host'];
$user = $jiraConfig['user'];
$password = $jiraConfig['password'];

$client = new Client($hostJira, $user , $password);
