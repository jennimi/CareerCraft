<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display the MBTI quiz and optionally the result.
     */
    public function showQuiz(Request $request)
    {
        // Load questions from JSON
        $questions = json_decode(file_get_contents(base_path('resources/js/questions.js')), true);
        shuffle($questions);

        // Default result is null; will be populated after form submission
        $result = $request->session()->get('result', null);

        return view('quiz', compact('questions', 'result'));
    }

    /**
     * Handle quiz submission and calculate MBTI result.
     */
    public function submitQuiz(Request $request)
    {
        // Load questions for reference
        $questions = json_decode(file_get_contents(base_path('resources/js/questions.js')), true);

        // Validate input
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:1|max:5', // Ensure answers are integers between 1 and 5
        ]);

        $answers = $request->input('answers');

        // Initialize MBTI scores
        $scores = [
            'I' => 0,
            'E' => 0,
            'S' => 0,
            'N' => 0,
            'T' => 0,
            'F' => 0,
            'J' => 0,
            'P' => 0,
        ];

        // Calculate scores based on user answers
        foreach ($questions as $question) {
            $questionId = $question['id'];

            if (!isset($answers[$questionId])) {
                continue; // Skip unanswered questions (should not happen with validation)
            }

            $answer = $answers[$questionId];
            $weights = $question['weights'];

            // Map answer scale to multiplier
            $multiplier = match ($answer) {
                "1" => -2, // Strongly Disagree
                "2" => -1, // Disagree
                "3" => 0,  // Neutral
                "4" => 1,  // Agree
                "5" => 2,  // Strongly Agree
            };

            // Apply weights to MBTI dimensions
            foreach ($weights as $type => $weight) {
                $scores[$type] += $weight * $multiplier;
            }
        }

        // Determine MBTI type
        $mbti = ($scores['I'] >= $scores['E'] ? 'I' : 'E') .
            ($scores['S'] >= $scores['N'] ? 'S' : 'N') .
            ($scores['T'] >= $scores['F'] ? 'T' : 'F') .
            ($scores['J'] >= $scores['P'] ? 'J' : 'P');

        $mbtiResults = json_decode(file_get_contents(base_path('resources/js/mbtiresult.js')), true);

        foreach ($mbtiResults as $mbtiResult) {
            if ($mbtiResult['mbti'] = $mbti) {
                $resultDetails = $mbtiResult;
            }
        }

        // Store the result in session
        // $request->session()->flash('result', $mbti);

        // dd($resultDetails, $mbti);
        return redirect()->route('quiz.result', [
            'mbti' => $mbti,
            'resultDetails' => json_encode($resultDetails), // Pass as a JSON string for simplicity
        ]);
        // Redirect back to the quiz
        // return redirect()->route('quiz');
    }

    public function showResult(Request $request)
    {
        // Retrieve data from query parameters
        $mbti = $request->query('mbti');
        $resultDetails = json_decode($request->query('resultDetails'), true);

        // Render the result view
        return view('quiz-result', [
            'mbti' => $mbti,
            'resultDetails' => $resultDetails,
        ]);
    }

    public function showRoadmap($job)
    {
        // Load roadmaps from JSON
        $roadmaps = json_decode(file_get_contents(base_path('resources/js/roadmaps.js')), true);

        // Find the roadmap for the specific job
        $roadmap = collect($roadmaps)->firstWhere('job', $job);

        if (!$roadmap) {
            abort(404, 'Roadmap not found');
        }

        return view('roadmap', compact('roadmap'));
    }
}
