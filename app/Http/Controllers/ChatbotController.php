<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    //

    public function respond(Request $request)
    {
        $message = $request->input('message');

        // Example: call OpenAI API for response
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $reply = $data['choices'][0]['message']['content'];

        return response()->json(['reply' => $reply]);
    }
}
