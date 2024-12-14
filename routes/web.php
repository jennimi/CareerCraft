<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('chatbot');
});

use App\Http\Controllers\ChatbotController;

Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);
