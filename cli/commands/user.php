<?php
$usage = "
Usage:  
        user all
        user new
        user search <name>
Arguments:
        <name>  Pass user or Email
";

use Jira\Service;

return function($context) use ($usage, $client) {
    $options = (new \Docopt\Handler)->handle($usage, $context->args);

    $user = new Service\User($client);
    if ($options['all'] === true) {
        echo $user->getAll();
    }

    if ($options['new'] === true) {
        echo $user->newUser([]);
    }

    if ($options['search'] === true) {
        $name = $options['<name>'];
        echo $user->getUser($name);
    }
};
