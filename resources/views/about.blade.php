@extends('layouts.app')

@section('title', 'About CareerCraft')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <!-- Hero Section -->
        <header class="text-center mb-16">
            <h1 class="text-5xl font-bold text-[#766FFF] mb-6">About CareerCraft</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                CareerCraft is an AI-powered platform designed to empower you with informed career decisions and
                personalized guidance throughout your learning journey.
            </p>
        </header>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div>
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-4">Free Career Questionnaire</h3>
                <p class="text-gray-700">
                    Answer a few simple questions to discover career paths tailored to your interests, abilities, and goals.
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-4">Personalized AI Guidance</h3>
                <p class="text-gray-700">
                    Receive actionable recommendations, curated learning pathways, and ongoing support for your career growth.
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-4">Continuous Support</h3>
                <p class="text-gray-700">
                    Stay on track with continuous progress tracking and expert assistance whenever you need it.
                </p>
            </div>
        </div>

        <div style="height: 100px"></div>

        <!-- Why Choose CareerCraft Section -->
        <div class="mt-20">
            <h2 class="text-3xl font-semibold text-[#766FFF] text-center mb-12">Why Choose CareerCraft?</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-[#766FFF] text-white rounded-full flex items-center justify-center">
                        <i class="fas fa-brain text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">AI-Driven Recommendations</h3>
                        <p class="text-gray-700">
                            Get tailored career suggestions based on your profile to help you succeed in your journey.
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-[#766FFF] text-white rounded-full flex items-center justify-center">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Structured Learning</h3>
                        <p class="text-gray-700">
                            Access curated learning materials to sharpen your skills and prepare for your career path.
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-[#766FFF] text-white rounded-full flex items-center justify-center">
                        <i class="fas fa-heart text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Ongoing Motivation</h3>
                        <p class="text-gray-700">
                            Stay motivated with daily encouragement and continuous progress updates to achieve your goals.
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-[#766FFF] text-white rounded-full flex items-center justify-center">
                        <i class="fas fa-life-ring text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Real-Time Assistance</h3>
                        <p class="text-gray-700">
                            Get expert guidance and answers to your questions in real time, whenever you need support.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 100px"></div>

        <!-- Testimonials Section -->
        <div class="mt-20 text-center">
            <h2 class="text-3xl font-semibold text-[#766FFF] mb-12">What Our Users Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <img src="https://randomuser.me/api/portraits/men/50.jpg" alt="User Photo"
                        class="w-20 h-20 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">"CareerCraft helped me understand my career goals better and gave me a
                        roadmap to follow. I'm now more confident about my future!"</p>
                    <p class="font-semibold text-gray-900">John Doe</p>
                    <p class="text-gray-500 text-sm">Software Engineer</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User Photo"
                        class="w-20 h-20 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">"I loved how personalized the guidance was. The daily motivation kept me
                        going through tough learning moments!"</p>
                    <p class="font-semibold text-gray-900">Jane Smith</p>
                    <p class="text-gray-500 text-sm">Marketing Specialist</p>
                </div>
            </div>
        </div>
    </div>
@endsection
