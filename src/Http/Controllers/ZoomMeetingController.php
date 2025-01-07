<?php

namespace Naveenkumardps\Zoomapi\Http\Controllers;

use Illuminate\Support\Arr;

class ZoomMeetingController extends ZoomAuthController
{
    public function createMeeting(array $data)
    {
        try {
            $response = $this->client->request('POST', 'users/me/meetings', [
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

    public function updateMeeting(string $meetingId, array $data)
    {
        try {
            $response = $this->client->request('PATCH', 'meetings/' . $meetingId, [
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

      // get meeting
      public function getMeeting(string $meetingId)
      {
          try {
              $response = $this->client->request('GET', 'meetings/' . $meetingId);
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

       // get all meetings
    public function getAllMeeting()
    {
        try {
            $response = $this->client->request('GET', 'users/me/meetings');
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

    public function deleteMeeting()
    {
        return 'Delete Meeting';
    }

    public function listMeeting()
    {
        return 'List Meeting';
    }
}