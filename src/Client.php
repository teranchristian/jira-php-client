<?php
namespace Jira;

class Client
{
    private $url;
    private $username;
    private $password;
    private $apiVersion = 2;

    public function __construct(
        $jiraHost,
        $username,
        $password)
    {
        $this->url = "https://".$jiraHost."/rest/api/latest/";
        $this->username = $username;
        $this->password = $password;
    }

    private function getUri($uri)
    {
        return $this->url.$uri;
    }

    private function createRequest($method, $uri, array $data = array())
    {
        $url = $this->getUri($uri);

        $ch = curl_init();
        if (!empty($data)) {
            if (!empty($method) && $method == 'GET') {
                $url = $url."?".http_build_query($data);
            }

            $data = json_encode($data);
            if (!empty($method) && $method == 'POST') {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->username}:{$this->password}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
          array(
            'Accept: application/json',
            'Content-Type: application/json',
            // 'Content-Length: ' . strlen(json_encode($data))
          )
        ); 
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function get($uri, $data)
    {
        return $this->createRequest("GET", $uri, $data);
    }

    public function post($uri, $data)
    {
        return $this->createRequest("POST", $uri, $data);
    }
}
