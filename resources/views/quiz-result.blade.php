@extends('layouts.app')

@section('title', 'Your Personality Results')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold text-[#766FFF] mb-6">Your Personality Results</h1>

    <!-- MBTI Type and Description -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-900">Your MBTI Type: <span class="text-[#766FFF]">{{ $mbti }}</span></h2>
        <p class="text-gray-700 mt-4">{{ $resultDetails['description'] }}</p>
    </div>

    <!-- Recommended Careers -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recommended Careers</h3>
        <div class="flex flex-wrap gap-4">
            @foreach ($resultDetails['careers'] as $career)
            <div class="px-4 py-2 bg-[#F8FAFF] text-gray-700 border border-gray-300 rounded-lg shadow-sm">
                {{ $career }}
            </div>
            @endforeach
        </div>
    </div>

    <!-- Go to Jobs Button -->
    <div class="text-center mt-8">
        <a href="{{ route('jobs') }}" class="py-2 px-6 bg-[#766FFF] text-white font-semibold rounded-lg hover:bg-[#6858f2] transition">
            Check out your roadmap!
        </a>
    </div>
</div>
@endsection
