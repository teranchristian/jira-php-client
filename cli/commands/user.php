<?php
$usage = "
Usage:  
        user all
        user new
"; 
use Jira\Service;

return function($context) use ($usage, $client) {
    $options = (new \Docopt\Handler)->handle($usage, $context->args);

    $issue = new Service\User($client);
    if ($options['all'] === true) {
        echo $issue->getAll();
    }

    if ($options['new'] === true) {
        echo $issue->newUser([]);
    }
};
