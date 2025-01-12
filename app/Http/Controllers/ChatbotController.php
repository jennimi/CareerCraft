<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');
        $apiKey = env('REPLICATE_API_TOKEN');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key={$apiKey}";

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'prompt' => [
                        'text' => $userMessage,
                    ],
                    'temperature' => 0.7,
                    'maxOutputTokens' => 150,
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);
            $reply = $responseBody['candidates'][0]['output'] ?? 'No response available.';

            return response()->json(['reply' => $reply]);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Something went wrong.']);
        }
    }
}
