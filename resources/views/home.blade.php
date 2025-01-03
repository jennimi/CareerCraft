@extends('layouts.app')

@section('title', 'Quiz')

@section('content')

    <!-- Hero Section -->
    <header class="flex flex-wrap items-center justify-between px-10 py-16" style="padding-left: 100px; padding-right: 100px;">
        <!-- Text Content -->
        <div class="max-w-lg">
            <h1 class="text-4xl font-bold mb-4 leading-tight">
                Your <span class="text-blue-600">AI-Powered</span> <br>
                Mentor for a Future-Ready <span class="text-blue-600">Career</span>
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
@endsection
