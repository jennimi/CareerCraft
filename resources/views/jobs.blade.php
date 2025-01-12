@extends('layouts.app')

@section('title', 'Jobs')

@section('content')

    <!-- Subscription Section -->
    <div class="mt-4 px-4">
        <h2 class="text-3xl font-bold text-center text-[#766FFF] mb-8">Subscription Plans</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Free Plan -->
            <div
                class="w-full md:w-1/3 bg-white shadow rounded-lg p-6 text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Free Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Access to basic quizzes</li>
                    <li>Limited career roadmap</li>
                </ul>
                <p class="text-2xl font-bold text-gray-900 mb-6">Free</p>
                <!-- Add an anchor link to scroll to the careers section -->
                <a href="#careers-section" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
                    View example roadmaps!
                </a>
            </div>

            <!-- Standard Plan -->
            <div
                class="w-full md:w-1/3 bg-white shadow rounded-lg p-6 text-center border-2 border-[#766FFF] transition-transform transform hover:scale-105 hover:shadow-lg hover:border-[#6858f2]">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-4">Standard Plan</h3>
                <ul class="text-gray-700 mb-6 text-left list-disc list-inside">
                    <li>Unlock more advanced quizzes</li>
                    <li>Access detailed career roadmaps</li>
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

    <div style="height: 100px"></div>

    <!-- Careers Section -->
    <div id="careers-section" class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded mt-16">
        <h1 class="text-3xl font-bold text-[#766FFF] mb-4">Explore Careers with Us</h1>

        <!-- Introduction -->
        <p class="text-gray-700 mb-6">
            At CareerCraft, we are committed to helping you find the career path that suits you best. Our platform provides
            detailed guidance, including personality quizzes, roadmaps, and insights into three exciting fields: Programmer,
            CEO, and Visual Communication Designer.
        </p>

        <!-- Example Jobs -->
        <h2 class="text-2xl font-semibold mb-4">Career Examples</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Programmer -->
            <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-2">Programmer</h3>
                <p class="text-gray-600 mb-4">
                    Dive into the world of coding and technology, solving complex problems to build innovative solutions.
                </p>
                <a href="{{ route('roadmap', ['job' => 'programmer']) }}" class="text-blue-500 hover:underline">
                    Learn More →
                </a>
            </div>

            <!-- CEO -->
            <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-2">CEO</h3>
                <p class="text-gray-600 mb-4">
                    Take the lead in managing and growing businesses, turning visions into reality through strategic
                    planning.
                </p>
                <a href="{{ route('roadmap', ['job' => 'ceo']) }}" class="text-blue-500 hover:underline">
                    Learn More →
                </a>
            </div>

            <!-- Visual Communication Designer -->
            <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-[#766FFF] mb-2">Visual Communication Designer</h3>
                <p class="text-gray-600 mb-4">
                    Express creativity through stunning designs, creating impactful visual content for diverse audiences.
                </p>
                <a href="{{ route('roadmap', ['job' => 'vcd']) }}" class="text-blue-500 hover:underline">
                    Learn More →
                </a>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
