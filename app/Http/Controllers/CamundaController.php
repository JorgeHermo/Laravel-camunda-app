<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CamundaController extends Controller
{
    public function getTasks($assignee = null)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080/engine-rest/',
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('demo:demo'),
            ],
        ]);

        $queryParams = [];

        if (!is_null($assignee)) {
            $queryParams['assignee'] = $assignee;
        }

        $response = $client->get('task', [
            'query' => $queryParams,
        ]);

        if ($response->getStatusCode() === 200) {
            $tasks = json_decode($response->getBody(), true);
            return view('tasks.tasks', ['tasks' => $tasks]);
        } else {
            return view('error', ['message' => 'Error retrieving tasks']);
        }
    }
}
