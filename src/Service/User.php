<?php
namespace Jira\Service;

class User extends Base
{
    const MAX_RESULTS = 20;

    protected function basePath()
    {
        return "user";
    }

    public function getAll($maxResults = self::MAX_RESULTS ,$active = true, $inactive = false)
    {
        $data = array(
            "startAt" => 0 ,
            "maxResults" => $maxResults,
            "username" => '.',
            'includeInactive' => ($inactive) ? 'true' : 'false',
            'includeActive' => ($active) ? 'true' : 'false'
        );
        return $this->api->get($this->basePath().'/search', $data);
    }

    public function getUser($nameOrEmail)
    {
        $data = array(
            'username' => $nameOrEmail
        );
        return $this->api->get($this->basePath().'/search', $data);
    }

    public function newUser(array $user)
    {
        return $this->api->post($this->basePath(), $user);
    }
}
