@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold text-[#766FFF] mb-4">Explore Careers with Us</h1>

    <!-- Introduction -->
    <p class="text-gray-700 mb-6">
        At CareerCraft, we are committed to helping you find the career path that suits you best. Our platform provides detailed guidance, including personality quizzes, roadmaps, and insights into three exciting fields: Programmer, CEO, and Visual Communication Designer.
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
                Take the lead in managing and growing businesses, turning visions into reality through strategic planning.
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
@endsection
