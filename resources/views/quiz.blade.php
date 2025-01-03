@extends('layouts.app')

@section('title', 'Personality Quiz')

@section('content')

<style>
    /* Default hover behavior */
    .peer:hover + span {
        background-color: rgba(118, 111, 255, 0.6);
        border-color: rgba(118, 111, 255, 0.6);
    }

    /* Smooth transition for hover and selected effects */
    span {
        transition: background-color 0.2s ease, border-color 0.2s ease;
    }

    .peer:checked + span {
        background-color: #766FFF; /* Solid color when selected */
        border-color: transparent;
    }
</style>


<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold text-[#766FFF] mb-6"></h1>
    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf

        <!-- Loop through questions -->
        @foreach ($questions as $question)
        <div class="text-center mb-6 pt-10">
            <h2 class="text-lg font-semibold mb-4">{{ $question['question'] }}</h2>
            <div class="flex justify-center items-center space-x-6">
                <!-- Disagree Label -->
                <span class="text-red-600 font-medium">Strongly Disagree</span>

                <!-- Options -->
                @for ($i = 1; $i <= 5; $i++)
                <label class="flex flex-col items-center">
                    <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $i }}" class="hidden peer" required>
                    <span class="
                        flex items-center justify-center rounded-full border border-gray-300 cursor-pointer
                        peer-checked:bg-[#766FFF] peer-checked:border-transparent peer-checked:scale-110
                        transition-transform
                        @if ($i == 1 || $i == 5) w-12 h-12 md:w-14 md:h-14 @endif
                        @if ($i == 2 || $i == 4) w-10 h-10 md:w-12 md:h-12 @endif
                        @if ($i == 3) w-8 h-8 md:w-10 md:h-10 @endif
                    ">
                        <span class="hidden">{{ $i }}</span>
                    </span>
                </label>
                @endfor

                <!-- Agree Label -->
                <span class="text-green-600 font-medium">Strongly Agree</span>

            </div>
        </div>


        @endforeach

        <button type="submit" class="py-2 px-4 bg-[#766FFF] text-white rounded hover:bg-[#6858f2] transition">
            Submit Quiz
        </button>
    </form>
</div>
@endsection
