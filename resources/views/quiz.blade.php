@extends('layouts.app')

@section('title', 'Personality Quiz')

@section('content')

    <style>
        /* Hover behavior for options */
        .peer:hover+span {
            background-color: rgba(118, 111, 255, 0.6);
            border-color: rgba(118, 111, 255, 0.6);
        }

        /* Smooth transition for hover and selected effects */
        span {
            transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
        }

        .peer:checked+span {
            background-color: #766FFF;
            /* Solid color when selected */
            border-color: transparent;
            transform: scale(1.1);
            /* Slight scaling for selected */
        }
    </style>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold text-[#766FFF] mb-6">Personality Quiz</h1>
        <form id="quizForm" action="{{ route('quiz.submit') }}" method="POST">
            @csrf

            <!-- Questions Section -->
            <div id="questionsContainer">
                @foreach (array_chunk($questions, 5) as $index => $chunk)
                    <div class="question-page @if ($index !== 0) hidden @endif">
                        @foreach ($chunk as $question)
                            <div class="mb-8">
                                <h2 class="text-lg font-semibold mb-4">{{ $question['question'] }}</h2>
                                <div class="flex justify-center items-center space-x-6">
                                    <!-- Strongly Disagree Label -->
                                    <span class="text-red-600 font-medium">Strongly Disagree</span>

                                    <!-- Radio options -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="flex flex-col items-center">
                                            <input type="radio" name="answers[{{ $question['id'] }}]"
                                                value="{{ $i }}" class="hidden peer" required>
                                            <span
                                                class="flex items-center justify-center rounded-full border border-gray-300 cursor-pointer
                                peer-checked:bg-[#766FFF] peer-checked:border-transparent peer-checked:scale-110
                                transition-transform duration-200 ease-in-out
                                @if ($i == 1 || $i == 5) w-12 h-12 md:w-14 md:h-14 @endif
                                @if ($i == 2 || $i == 4) w-10 h-10 md:w-12 md:h-12 @endif
                                @if ($i == 3) w-8 h-8 md:w-10 md:h-10 @endif">
                                                <span class="sr-only">{{ $i }}</span>
                                            </span>
                                        </label>
                                    @endfor

                                    <!-- Strongly Agree Label -->
                                    <span class="text-green-600 font-medium">Strongly Agree</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-6">
                <button type="button" id="prevButton"
                    class="py-2 px-4 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition hidden">
                    Previous
                </button>
                <button type="button" id="nextButton"
                    class="py-2 px-4 bg-[#766FFF] text-white rounded-lg hover:bg-[#6858f2] transition">
                    Next
                </button>
                <button type="submit" id="submitQuiz"
                    class="py-2 px-6 bg-[#766FFF] text-white font-semibold rounded-lg hover:bg-[#6858f2] transition duration-200 hidden">
                    Submit Quiz
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pages = document.querySelectorAll('.question-page');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            const submitQuizButton = document.getElementById('submitQuiz');
            const quizForm = document.getElementById('quizForm');

            let currentPage = 0;

            // Show the current page and hide others
            const updatePage = () => {
                pages.forEach((page, index) => {
                    page.classList.toggle('hidden', index !== currentPage);
                });
                prevButton.classList.toggle('hidden', currentPage === 0);
                nextButton.classList.toggle('hidden', currentPage === pages.length - 1);
                submitQuizButton.classList.toggle('hidden', currentPage !== pages.length - 1);
            };

            // Navigation button listeners
            nextButton.addEventListener('click', () => {
                if (currentPage < pages.length - 1) {
                    currentPage++;
                    updatePage();
                }
            });

            prevButton.addEventListener('click', () => {
                if (currentPage > 0) {
                    currentPage--;
                    updatePage();
                }
            });
        });
    </script>

@endsection
