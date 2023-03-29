<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CamundaController extends Controller
{
    public function getTasks()
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080/engine-rest/',
            'headers' =>[
                'Authorization' => 'Basic' . base64_encode('demo:demo'),
            ],
        ]);

        $response = $client->get('task', [
            'query' => [
                'assignee' => 'kermit',
                'sortBy' => 'dueDate',
                'sortOrder' => 'asc',
            ],
        ]);

        if($response->getStatusCode()=== 200) {
            $task = json_decode($response->getBody(), true);
            return view ('task', ['task' => $tasks]);
        } else {
            return view ('error', ['message' => 'Error retrieving tasks']);
        }
    }
}
