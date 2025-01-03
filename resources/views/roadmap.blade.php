@extends('layouts.app')

@section('title', 'Roadmap')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold text-[#766FFF] mb-4">{{ ucfirst($roadmap['job']) }} Roadmap</h1>

    <!-- Job Description -->
    <p class="text-gray-700 mb-6">
        {{ $roadmap['description'] }}
    </p>

    <!-- Specific Jobs -->
    <h2 class="text-2xl font-semibold mb-4">Specific Jobs</h2>
    <ul class="list-disc pl-6 mb-6">
        @foreach ($roadmap['specific_jobs'] as $specificJob)
        <li class="mb-4">
            <strong>{{ $specificJob['title'] }}</strong> ({{ $specificJob['salary'] }})
            <ul class="list-disc pl-6 mt-2">
                @foreach ($specificJob['responsibilities'] as $responsibility)
                <li>{{ $responsibility }}</li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>

    <!-- Roadmap -->
    <h2 class="text-2xl font-semibold mb-4">Roadmap</h2>
    @foreach ($roadmap['roadmap'] as $plan)
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2">Month {{ $plan['month'] }}</h3>

        <!-- Skills -->
        <h4 class="text-lg font-medium mb-2">Skills to Learn</h4>
        <ul class="list-disc pl-6 mb-4">
            @foreach ($plan['skills'] as $skill)
            <li class="mb-2">
                <strong>{{ $skill['name'] }}</strong>: {{ $skill['details'] }}
                <ul class="list-disc pl-6 mt-2">
                    @foreach ($skill['resources'] as $resource)
                    <li><a href="{{ $resource['url'] }}" target="_blank" class="text-blue-500 hover:underline">{{ $resource['platform'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>

        <!-- Degrees -->
        @if (!empty($plan['degrees']))
        <h4 class="text-lg font-medium mb-2">Degrees</h4>
        <p class="mb-4">{{ $plan['degrees'] }}</p>
        @endif

        <!-- Certifications -->
        @if (!empty($plan['certifications']))
        <h4 class="text-lg font-medium mb-2">Certifications</h4>
        <ul class="list-disc pl-6 mb-4">
            @foreach ($plan['certifications'] as $certification)
            <li>
                <a href="{{ $certification['url'] }}" target="_blank" class="text-blue-500 hover:underline">
                    {{ $certification['name'] }} - {{ $certification['provider'] }}
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    @endforeach

    <!-- Soft Skills -->
    @if (!empty($roadmap['soft_skills']))
    <h2 class="text-2xl font-semibold mb-4">Soft Skills</h2>
    <ul class="list-disc pl-6">
        @foreach ($roadmap['soft_skills'] as $softSkill)
        <li>{{ $softSkill }}</li>
        @endforeach
    </ul>
    @endif
</div>
@endsection
