@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Hero Section -->
    <header class="flex flex-wrap items-center justify-between px-10 py-16"
        style="padding-left: 100px; padding-right: 100px;">
        <!-- Text Content -->
        <div class="max-w-lg">
            <h1 class="text-5xl font-black mb-4 leading-tight">
                Your <span class="text-[#766FFF]">AI-Powered</span> <br>
                Mentor for a Future-Ready <span class="text-[#766FFF]">Career</span>
            </h1>
            <p class="text-lg text-gray-600">
                Personalized learning paths, motivational support, and career insights, empowering young people
                to confidently navigate their future in the ever-changing world.
            </p>
        </div>

        <!-- Illustration -->
        <div>
            <img src={{ asset('images/mascot.png') }} alt="Futuristic Character" style="width: 500px">
        </div>
    </header>

    <div class="mt-16 px-4">
        <h2 class="text-3xl font-bold text-center text-[#766FFF] mb-8">Subscription Plans</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Free Plan -->
            <div
                class="w-full md:w-1/3 bg-white shadow rounded-lg p-6 text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Free Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Access basic quizzes</li>
                    <li>Limited career roadmap</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">Free</p>
                <a href="{{ route('login') }}"
                    class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Get Started
                </a>
            </div>

            <!-- Standard Plan -->
            <div
                class="w-full md:w-1/3 bg-white shadow rounded-lg p-6 text-center border-2 border-[#766FFF] transition-transform transform hover:scale-105 hover:shadow-lg hover:border-[#6858f2]">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Standard Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Unlock all quizzes</li>
                    <li>Generate 5 detailed Roadmap to your liking</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">IDR 50,000/month</p>
                <a href="{{ route('subscribe', ['plan' => 'Standard']) }}"
                    class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Subscribe Now
                </a>
            </div>

            <!-- Premium Plan -->
            <div
                class="w-full md:w-1/3 bg-white shadow rounded-lg p-6 text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Premium Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>All Standard Plan features</li>
                    <li>Generate Unlimited Roadmaps</li>
                    <li>Chatbot assistance</li>
                    <li>Personalized career guidance</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">IDR 100,000/month</p>
                <a href="{{ route('subscribe', ['plan' => 'Premium']) }}"
                    class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    Subscribe Now
                </a>
            </div>

        </div>
    </div>

@endsection
