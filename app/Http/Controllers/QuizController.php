<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showQuiz()
    {
        // Load questions from JSON
        $questions = json_decode(file_get_contents(base_path('resources/js/questions.js')), true);
        shuffle($questions);
        return view('quiz', compact('questions'));
    }

    public function submitQuiz(Request $request)
    {
        $questions = json_decode(file_get_contents(base_path('resources/js/questions.js')), true);
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:1|max:5', // Ensure answers are integers between 1 and 5
        ]);

        $answers = $request->input('answers');

        $scores = [
            'programmer' => 0,
            'ceo' => 0,
            'vcd' => 0,
        ];

        foreach ($questions as $question) {
            $questionId = $question['id'];

            if (!isset($answers[$questionId])) {
            }

            $answer = $answers[$questionId];
            $weights = $question['weights'];

            // Debugging: Check the current answer and weights
            // dd($questionId, $answer, $weights);

            // Assign points based on user's answer
            $multiplier = match ($answer) {
                "1" => -2, // Strongly Disagree
                "2" => -1, // Disagree
                "3" => 0,  // Neutral
                "4" => 1,  // Agree
                "5" => 2,  // Strongly Agree
            };

            foreach ($weights as $job => $weight) {
                $scores[$job] += $weight * $multiplier;
            }
        }

        $recommendedJob = array_keys($scores, max($scores))[0];
        // dd($recommendedJob);
        // Redirect to the roadmap
        return redirect()->route('roadmap', ['job' => $recommendedJob]);
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
