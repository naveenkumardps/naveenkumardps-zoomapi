<?php

namespace Naveenkumardps\Zoomapi\Http\Controllers;

use  GuzzleHttp\Client;

class ZoomAuthController
{
   protected $client_id;
   protected $client_secret;
   protected $redirect_uri;
   protected $base_url;
   protected $account_id;
   protected $grant_type;
   protected $accessToken;
   protected $client;

    public function __construct()
    {
        $this->client_id = config('zoom.client_id');
        $this->client_secret = config('zoom.client_secret');   
        $this->redirect_uri = config('zoom.redirect_uri');  
        $this->base_url = config('zoom.base_url');
        $this->account_id = config('zoom.account_id');
        $this->grant_type = config('zoom.grant_type');

        $this->accessToken = $this->getAccessToken();

        $this->client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
            ],
        ]);
    }


    protected function getAccessToken()
    {

        $client = new Client([
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->client_id . ':' . $this->client_secret),
                'Host' => 'zoom.us',
            ],
        ]);

        $response = $client->request('POST', "https://zoom.us/oauth/token", [
            'form_params' => [
                'grant_type' => $this->grant_type,
                'account_id' => $this->account_id,
            ],
        ]);

        $responseBody = json_decode($response->getBody(), true);
        return $responseBody['access_token'];
    }

}