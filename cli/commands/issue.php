<?php
$usage = "
Usage:  
        issue new <projectKey>
                  <summary>
                  <description>
                  <issueId>
                  [<userName>]
                  [ (customfield (<fieldId> <value>)...) ]
        issue get <issueId>
Arguments:
        <name>  Pass user or Email
";

use Jira\Service;

return function($context) use ($usage, $client) {
    $options = (new \Docopt\Handler)->handle($usage, $context->args);

    $issue = new Service\Issue($client);
    if ($options['new'] === true) {

        $projectKey = $options['<projectKey>'];
        $summary = $options['<summary>'];
        $description = $options['<description>'];
        $issueId = $options['<issueId>'];
        $userName = $options['<userName>'];
        $fieldIds = $options['<fieldId>'];
        $values = $options['<value>'];

        $customfields = array();
        if ($options['<customfield>']) {
            $customfields = array_combine($fieldIds, $values);
        }

        echo $issue->newIssue($projectKey,
                              $summary,
                              $description,
                              $issueId,
                              $userName,
                              $customfields);
    }

    if ($options['get'] === true) {
        $issueId = $options['<issueId>'];
        echo $issue->get($issueId);
    }
};
