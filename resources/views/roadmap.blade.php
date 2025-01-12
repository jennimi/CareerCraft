@extends('layouts.app')

@section('title', ucfirst($roadmap['job']) . ' Roadmap')

@section('content')
    <div class="max-w-6xl mx-auto p-8 bg-white shadow-md rounded-lg">
        <h1 class="text-4xl font-bold text-[#766FFF] mb-6">{{ ucfirst($roadmap['job']) }} Roadmap</h1>

        <!-- Job Description -->
        <div class="mb-8">
            <p class="text-gray-700 text-lg leading-relaxed">
                {{ $roadmap['description'] }}
            </p>
        </div>

        <!-- Specific Jobs Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Specific Jobs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($roadmap['specific_jobs'] as $specificJob)
                    <div class="bg-[#f9fafb] p-6 rounded-lg shadow-md border hover:shadow-lg transition-shadow">
                        <h3 class="text-lg font-semibold text-[#766FFF] mb-2">{{ $specificJob['title'] }}</h3>
                        <p class="text-sm text-gray-500 mb-4 font-medium">Salary: {{ $specificJob['salary'] }}</p>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Responsibilities:</h4>
                        <ul class="list-disc pl-6 text-sm text-gray-700">
                            @foreach ($specificJob['responsibilities'] as $responsibility)
                                <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Degrees Section -->
        @if (!empty($roadmap['top_degrees']))
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Recommended Degrees</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($roadmap['top_degrees'] as $degree)
                        <div class="bg-[#f9fafb] p-4 rounded-lg shadow-sm border hover:shadow-lg transition-shadow">
                            <h3 class="text-md font-semibold text-[#766FFF] mb-2">{{ $degree['degree'] }}</h3>
                            <p class="text-xs text-gray-600 mb-4">{{ $degree['why_useful'] }}</p>
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Careers:</h4>
                            <ul class="list-disc pl-6 text-xs text-gray-700">
                                @foreach ($degree['careers'] as $career)
                                    <li>{{ $career }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Soft Skills Section -->
        @if (!empty($roadmap['soft_skills']))
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Soft Skills</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($roadmap['soft_skills'] as $softSkill)
                        <div class="bg-[#f9fafb] py-2 px-4 rounded-lg shadow-sm border text-center">
                            <p class="text-xs font-medium text-gray-700">{{ $softSkill }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Step-by-Step Roadmap Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">12-Month Step-by-Step Roadmap</h2>
            <div class="relative flex flex-col items-start">
                @foreach ($roadmap['roadmap'] as $plan)
                    <div class="relative mb-12 flex items-center">
                        <!-- Connector Line -->
                        @if (!$loop->last)
                            <div class="absolute left-5 top-0 h-full w-[2px] bg-[#766FFF]"></div>
                        @endif

                        <!-- Step Circle -->
                        <div
                            class="flex items-center justify-center w-12 h-12 bg-[#766FFF] text-white font-bold rounded-full shadow-lg z-10">
                            {{ $plan['month'] }}
                        </div>

                        <!-- Step Content -->
                        <div class="ml-6 bg-[#f9fafb] p-6 rounded-lg shadow-md border w-full">
                            <h3 class="text-xl font-bold text-[#766FFF] mb-4">Month {{ $plan['month'] }}</h3>
                            <p class="text-gray-700 mb-4">{{ $plan['focus'] }}</p>

                            <!-- Skills -->
                            <div class="mb-4">
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Skills to Learn:</h4>
                                <ul class="list-disc pl-6 text-gray-700">
                                    @foreach ($plan['skills'] as $skillId)
                                        @php
                                            // Find the skill by ID in the main skills array
                                            $skill = collect($roadmap['skills'])->firstWhere('id', $skillId);
                                        @endphp
                                        @if ($skill)
                                            <li class="mb-2">
                                                <strong>{{ $skill['name'] }}</strong>: {{ $skill['details'] }}
                                                <ul class="list-disc pl-6 mt-2">
                                                    @foreach ($skill['resources'] ?? [] as $resource)
                                                        <li>
                                                            <a href="{{ $resource['url'] }}" target="_blank"
                                                                class="text-blue-500 hover:underline">
                                                                {{ $resource['platform'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Certifications -->
                            @if (!empty($plan['certifications']))
                                <div class="mb-4">
                                    <h4 class="text-lg font-medium text-gray-900 mb-2">Certifications:</h4>
                                    <ul class="list-disc pl-6 text-gray-700">
                                        @foreach ($plan['certifications'] as $certification)
                                            <li>
                                                <a href="{{ $certification['url'] }}" target="_blank"
                                                    class="text-blue-500 hover:underline">
                                                    {{ $certification['name'] }} - {{ $certification['provider'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
