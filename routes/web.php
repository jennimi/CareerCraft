<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\QuizController;

Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage']);

Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('quiz');
Route::post('/quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');

Route::get('/roadmap/{job}', [QuizController::class, 'showRoadmap'])->name('roadmap');
