<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ReplicateService
{
    private $baseUri;
    private $apiKey;

    public function __construct()
    {
        $this->baseUri = config('services.replicate.base_uri');
        $this->apiKey = config('services.replicate.key');
    }

    public function createPrediction(string $model, array $input)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->baseUri . 'predictions', [
            'version' => $model,
            'input' => $input,
        ]);

        return $response->json();
    }

    public function getPredictionStatus(string $predictionId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $this->apiKey,
        ])->get($this->baseUri . 'predictions/' . $predictionId);

        return $response->json();
    }
}
