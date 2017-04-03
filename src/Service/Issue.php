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
        // prevent to encode `jql=project`
        $data = array(
            "jql" => 'project='.$projectKey,
            "maxResults" => $maxResults
        );
        return $this->api->get("search", $data);
    }

    public function get($issueKey)
    {
        // prevent to encode `jql=key`. Otherwise, it does not work
        $data = array(
            "jql" => 'key='.$issueKey,
        );
        return $this->api->get("search", $data);
    }

    public function newIssue($projectKey, $summary, $description, $issueId, $name = null, array $customField)
    {
        $data = array(
            "fields" => array(
                "project" => array(
                    "key" => $projectKey
                ),
                "summary" => $summary,
                "description" => $description,
                "issuetype" => array(
                    "id" => $issueId
                ),
                
           )
        );

        if ($name) {
            $data["fields"]["reporter"] = array(
                "name" => $name
            );
        }

        if (!empty($customField)) {
            foreach ($customField as $fieldId => $value) {
                $data["fields"]["customfield_{$fieldId}"][] = array(
                    "id" => $value
                );
            }
        }
        return $this->api->post($this->basePath(), $data);
    }

}
