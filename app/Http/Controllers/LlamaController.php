<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LlamaController extends Controller
{
    public function index()
    {
        // Initialize an empty message array if no messages exist
        $messages = session('messages', []);

        // Return the view with messages
        return view('chat', ['messages' => $messages]);
    }

    public function generate1(Request $request)
    {
        $prompt = $request->input('prompt');

        // Retrieve the API token from the environment
        $apiToken = env('REPLICATE_API_TOKEN');

        // Check if the API token is set
        if (!$apiToken) {
            return view('chat', [
                'response' => 'Error: API token is not set. Please check your configuration.',
                'prompt' => $prompt
            ]);
        }

        try {
            // Prepare the payload
            $payload = [
                "input" => [
                    "top_k" => 0,
                    "top_p" => 1,
                    "prompt" => $prompt,
                    "max_tokens" => 512,
                    "temperature" => 0.75,
                    "system_prompt" => "You are a helpful, respectful, and honest assistant. Always answer as helpfully as possible, while being safe. Your answers should not include any harmful, unethical, racist, sexist, toxic, dangerous, or illegal content. Please ensure that your responses are socially unbiased and positive in nature.\n\nIf a question does not make any sense, or is not factually coherent, explain why instead of answering something incorrect. If you don't know the answer to a question, please don't share false information.",
                    "length_penalty" => 1,
                    "max_new_tokens" => 800,
                    "prompt_template" => "<s>[INST] <<SYS>>\n{system_prompt}\n<</SYS>>\n\n{prompt} [/INST]",
                    "presence_penalty" => 0,
                    "log_performance_metrics" => false
                ]
            ];

            // Send the request to the API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiToken,
                'Content-Type' => 'application/json',
                'Prefer' => 'wait'
            ])->post('https://api.replicate.com/v1/models/meta/llama-2-7b-chat/predictions', $payload);

            // Handle the response
            if ($response->successful()) {
                $responseData = $response->json();
                // dd($response->json());
                // $output = $responseData['output'] ?? 'No response from the model.';
                $output = implode(' ', $responseData['output']) ?? 'No response from the model.';
            } else {
                // Handle errors
                $output = "Error: " . $response->status() . " - " . $response->body();
            }
        } catch (\Exception $e) {
            // Catch and display exceptions
            $output = "An error occurred: " . $e->getMessage();
        }

        // Return the response back to the view
        return view('chat', ['response' => $output, 'prompt' => $prompt]);
    }

    public function generate(Request $request)
    {
        $prompt = $request->input('prompt');
        $messages = session('messages', []);  // Retrieve existing messages from session

        // Add the user's message to the session
        $messages[] = ['sender' => 'user', 'text' => $prompt];
        session(['messages' => $messages]);

        // Retrieve the API token from the environment
        $apiToken = env('REPLICATE_API_TOKEN');

        // Check if the API token is set
        if (!$apiToken) {
            return view('chat', [
                'response' => 'Error: API token is not set. Please check your configuration.',
                'messages' => $messages
            ]);
        }

        try {
            // Prepare the payload
            $payload = [
                "input" => [
                    "top_k" => 0,
                    "top_p" => 1,
                    "prompt" => $prompt,
                    "max_tokens" => 512,
                    "temperature" => 0.75,
                    "system_prompt" => "You are a helpful, respectful, and honest assistant. Always answer as helpfully as possible.",
                    "length_penalty" => 1,
                    "max_new_tokens" => 800,
                    "prompt_template" => "<s>[INST] <<SYS>>\n{system_prompt}\n<</SYS>>\n\n{prompt} [/INST]",
                    "presence_penalty" => 0,
                    "log_performance_metrics" => false
                ]
            ];

            // Send the request to the API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiToken,
                'Content-Type' => 'application/json',
                'Prefer' => 'wait'
            ])->post('https://api.replicate.com/v1/models/meta/llama-2-7b-chat/predictions', $payload);

            // Handle the response
            if ($response->successful()) {
                $responseData = $response->json();
                // Join the array into one string and replace newline characters with <br>
                $output = implode(' ', $responseData['output']);
                $output = nl2br($output);  // Convert newlines to <br>
            } else {
                $output = "Error: " . $response->status() . " - " . $response->body();
            }
        } catch (\Exception $e) {
            // Catch and display exceptions
            $output = "An error occurred: " . $e->getMessage();
        }

        // Add the bot's response to the session
        $messages[] = ['sender' => 'bot', 'text' => $output];
        session(['messages' => $messages]);

        // Return the updated conversation to the view
        return view('chat', ['messages' => $messages]);
    }
}
