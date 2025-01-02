<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('chatbot');
});

use App\Http\Controllers\ChatbotController;

Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);

use App\Http\Controllers\LlamaController;

Route::get('/chat', [LlamaController::class, 'index'])->name('chat.index');
Route::post('/chat', [LlamaController::class, 'generate'])->name('chat.generate');


