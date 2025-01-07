<?php

namespace Naveenkumardps\Zoomapi\Http\Controllers;

class ZoomWebinarController extends ZoomAuthController
{
    public function createWebinar(array $data)
    {
        try {
            $response = $this->client->request('POST', 'users/me/webinars', [
                'json' => $data,
            ]);
            $res = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $res,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    public function updateWebinar(string $webinarId, array $data)
    {
        try {
            $response = $this->client->request('PATCH', 'webinars/' . $webinarId, [
                'json' => $data,
            ]);
            $res = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $res,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    // get webinar
    public function getWebinar(string $webinarId)
    {
        try {
            $response = $this->client->request('GET', 'webinars/' . $webinarId);
            $data = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $data,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    // get all webinar
    public function getAllWebinar()
    {
        try {
            $response = $this->client->request('GET', 'users/me/webinars');
            $data = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $data,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }
    // create  webinar template
    public function getAllWebinarTemplate(array $data)
    {

        try {
            $response = $this->client->request('POST', 'users/me/webinar_templates', [
                'json' => $data,
            ]);
            $res = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $res,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    public function createWebinarRegistrant(array $data){
        try {

            $response = $this->client->request('POST', 'users/me/registrants', [
                'json' => $data,
            ]);
            $res = json_decode($response->getBody(), true);
            return [
                'status' => true,
                'data' => $res,
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }
}
