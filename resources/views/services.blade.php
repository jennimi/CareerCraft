@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="flex flex-wrap justify-between items-center space-y-8 md:space-y-0">
        <!-- Left Section: Personality Quiz -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left px-4">
            <img src="{{ asset('images/quiz.png') }}" alt="Personality Quiz" class="w-50 md:w-full mb-6">
            <h2 class="text-2xl font-bold text-[#766FFF] mb-4">Personality Quiz</h2>
            <p class="text-gray-700 mb-6">
                Discover the perfect career path tailored to your unique personality. Our AI-powered quiz helps match you
                with the ideal job based on your interests and strengths.
            </p>
            <a href="{{ route('quiz') }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                Take the Quiz
            </a>
        </div>

        <!-- Right Section: Roadmap -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left px-4">
            <img src="{{ asset('images/roadmap.png') }}" alt="Roadmap" class="w-50 md:w-full mb-6">
            <h2 class="text-2xl font-bold text-[#766FFF] mb-4">Career Roadmap</h2>
            <p class="text-gray-700 mb-6">
                Get a step-by-step guide to achieving your career goals. Learn what skills to acquire, where to study, and
                what certifications you need to succeed in your dream job.
            </p>
            <a href="{{ route('jobs') }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                View the Roadmap
            </a>
        </div>
    </div>

    <!-- Subscription Section -->
    <div class="mt-16 px-4">
        <h2 class="text-3xl font-bold text-center text-[#766FFF] mb-8">Subscription Plans</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Free Plan -->
            <div class="w-full md:w-1/3 bg-white shadow-lg rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Free Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Access basic quizzes</li>
                    <li>Limited career roadmap</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">Free</p>
                <a href="#" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Get Started
                </a>
            </div>

            <!-- Standard Plan -->
            <div class="w-full md:w-1/3 bg-white shadow-lg rounded-lg p-6 text-center border-2 border-[#766FFF]">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Standard Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Unlock all quizzes</li>
                    <li>Access detailed career roadmaps</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">IDR 150,000/month</p>
                <a href="{{ route('subscribe', ['plan' => 'Standard']) }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Subscribe Now
                </a>
            </div>

            <!-- Premium Plan -->
            <div class="w-full md:w-1/3 bg-white shadow-lg rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Premium Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>All Standard Plan features</li>
                    <li>Chatbot assistance</li>
                    <li>Personalized career guidance</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">IDR 300,000/month</p>
                <a href="{{ route('subscribe', ['plan' => 'Premium']) }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Subscribe Now
                </a>
            </div>
        </div>
    </div>
@endsection
