<?php
$usage = "
Usage:  
        user all
        user new <name> <password> <email> <displayName> <notification>
        user search <nameOrEmail>
Arguments:
        <nameOrEmail>  Pass user or Email
";

use Jira\Service;

return function($context) use ($usage, $client) {
    $options = (new \Docopt\Handler)->handle($usage, $context->args);

    $user = new Service\User($client);
    if ($options['all'] === true) {
        echo $user->getAll();
    }

    if ($options['new'] === true) {
        $userData = array(
            'name' => $options['<name>'],
            'password' => $options['<password>'],
            'emailAddress' => $options['<email>'],
            'displayName' => $options['<displayName>'],
            'notification' => $options['<notification>']
        );
        echo $user->newUser($userData);
    }

    if ($options['search'] === true) {
        $name = $options['<nameOrEmail>'];
        echo $user->getUser($name);
    }
};
