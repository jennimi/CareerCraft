@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="flex flex-wrap justify-between items-center space-y-8 md:space-y-0">
        <!-- Left Section: Personality Quiz -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left px-4">
            <img src="{{ asset('images/quiz.png') }}" alt="Personality Quiz" class="md:w-full mb-6" style="height: 300px; width:auto;">
            <h2 class="text-2xl font-bold text-[#766FFF] mb-4">Personality Quiz</h2>
            <p class="text-gray-700 mb-6" style="width: 300px">
                Discover the perfect career path tailored to your unique personality. Our AI-powered quiz helps match you
                with the ideal job based on your interests and strengths.
            </p>
            <a href="{{ route('quiz') }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                Take the Quiz
            </a>
        </div>

        <!-- Right Section: Roadmap -->
        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left px-4">
            <img src="{{ asset('images/roadmap.png') }}" alt="Roadmap" class="md:w-full mb-6" style="height: 300px; width:auto;">
            <h2 class="text-2xl font-bold text-[#766FFF] mb-4">Career Roadmap</h2>
            <p class="text-gray-700 mb-6" style="width: 300px">
                Get a step-by-step guide to achieving your career goals. Learn what skills to acquire, where to study, and
                what certifications you need to succeed in your dream job.
            </p>
            <a href="{{ route('jobs') }}" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                View the Roadmap
            </a>
        </div>
    </div>

    <div style="height: 200px"></div>

    
@endsection
