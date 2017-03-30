<?php
namespace Jira\Service;

class Issue extends Base
{
    const MAX_RESULTS = 20;

    protected function basePath()
    {
        return "issue";
    }

    public function getAll($projectKey, $maxResults = self::MAX_RESULTS) 
    {
        $data = array(
            "jql=project" => $projectKey,
            "maxResults" => $maxResults
        );
        return $this->api->get("search", $data);
    }

}
