@extends('layouts.app')

@section('title', 'About CareerCraft')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <!-- Hero Section -->
        <header class="text-center mb-12 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-4xl font-bold text-[#766FFF] mb-4">About CareerCraft</h1>
            <p class="text-lg text-gray-600 mb-6">
                CareerCraft is an AI-powered platform that helps you make informed career decisions and provides
                personalized guidance throughout your learning journey.
            </p>
        </header>

        <!-- Main Content - Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-2 text-center">Free Career Questionnaire</h3>
                <p class="text-gray-700">
                    Start by taking our free career questionnaire that helps us understand your interests, abilities, and
                    goals. Based on your responses, we'll recommend the most suitable career paths for you.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-2 text-center">Personalized AI Guidance</h3>
                <p class="text-gray-700 mb-4">
                    Once you receive career recommendations, you can opt for CareerCraft Premium for additional features
                    like:
                </p>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Structured learning pathways tailored to your career goals</li>
                    <li>Daily motivation and support to keep you on track</li>
                    <li>Anytime consultation and Q&A for personalized assistance</li>
                </ul>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-[#766FFF] mb-2 text-center">Continuous Support</h3>
                <p class="text-gray-700">
                    CareerCraft offers ongoing support, tracking your progress and helping you identify areas of improvement
                    to ensure your success in your career journey.
                </p>
            </div>
        </div>

        <!-- Why Choose CareerCraft Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-[#766FFF] text-center mb-6">Why Choose CareerCraft?</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-[#766FFF] text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-brain text-3xl"></i> <!-- FontAwesome icon for AI-driven -->
                    </div>
                    <h3 class="text-lg font-semibold text-[#766FFF] mb-2">AI-Driven Career Recommendations</h3>
                    <p class="text-gray-700">
                        Tailored to your personal profile, our AI suggests the best career paths to help you succeed.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-[#766FFF] text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-book-open text-3xl"></i> <!-- FontAwesome icon for learning -->
                    </div>
                    <h3 class="text-lg font-semibold text-[#766FFF] mb-2">Structured Learning Resources</h3>
                    <p class="text-gray-700">
                        Access curated learning materials designed to advance your skills and prepare you for your chosen
                        career.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-[#766FFF] text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-heart text-3xl"></i> <!-- FontAwesome icon for motivation -->
                    </div>
                    <h3 class="text-lg font-semibold text-[#766FFF] mb-2">Ongoing Motivation & Support</h3>
                    <p class="text-gray-700">
                        Stay motivated with continuous support, ensuring you remain engaged and on track towards your goals.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-[#766FFF] text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-life-ring text-3xl"></i> <!-- FontAwesome icon for assistance -->
                    </div>
                    <h3 class="text-lg font-semibold text-[#766FFF] mb-2">Real-time Assistance & Q&A</h3>
                    <p class="text-gray-700">
                        Get real-time help and expert answers to your questions, ensuring you're always supported in your
                        career journey.
                    </p>
                </div>
            </div>
        </div>


        <!-- Testimonials Section -->
        <div class="mt-12 text-center">
            <h2 class="text-2xl font-semibold text-[#766FFF] mb-6">What Our Users Say</h2>
            <div class="flex justify-center gap-8">
                <!-- Testimonial 1 -->
                <div class="max-w-xs bg-white shadow-lg rounded-lg p-6">
                    <img src="https://randomuser.me/api/portraits/men/50.jpg" alt="User Photo"
                        class="w-16 h-16 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">"CareerCraft helped me understand my career goals better and gave me a
                        roadmap to follow. I'm now more confident about my future!"</p>
                    <p class="font-semibold text-[#766FFF]">John Doe</p>
                    <p class="text-gray-500">Software Engineer</p>
                </div>
                <!-- Testimonial 2 -->
                <div class="max-w-xs bg-white shadow-lg rounded-lg p-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User Photo"
                        class="w-16 h-16 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">"I loved how personalized the guidance was. The daily motivation kept me
                        going through tough learning moments!"</p>
                    <p class="font-semibold text-[#766FFF]">Jane Smith</p>
                    <p class="text-gray-500">Marketing Specialist</p>
                </div>
            </div>
        </div>
    </div>
@endsection
