<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LlamaController;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('home');
});

Route::get('/chat/messages', [App\Http\Controllers\LlamaController::class, 'getMessages'])->name('chat.messages');



Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/roadmap', function () {
    return view('jobs');
})->name('jobs');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/chat', [LlamaController::class, 'index']);
// Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);

Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('quiz');
Route::post('/quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/quiz/result', [QuizController::class, 'showResult'])->name('quiz.result');

Route::get('/chat', [LlamaController::class, 'index'])->name('chat.index');
Route::post('/chat', [LlamaController::class, 'generate'])->name('chat.generate');

// Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('quiz');

Route::get('/roadmap/{job}', [QuizController::class, 'showRoadmap'])->name('roadmap');

Route::get('/subscribe/{plan}', [ServiceController::class, 'subscribe'])->name('subscribe');
// Route::post('/quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');

Route::middleware(['auth'])->group(function () {
});

