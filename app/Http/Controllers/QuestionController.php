<?php

namespace App\Http\Controllers;

use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // show all questions
    public function index()
    {
        return view('questions.index', ['questions' => Question::latest()->filter(request(['tag', 'search']))->paginate(8)]);
    }

    // show a single question
    public function show(Question $question)
    {
        // dd($question);
        return view('questions.show', ['question' => $question]);
    }
    // show a single question
    public function create()
    {
        return view('questions.create', ['sampleTags' => array('Maths', 'English', 'Pharmacology', 'Biology', 'Government', 'hemotology', 'Philosophy')]);
    }
    // show a single question
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'question' => 'required',
            'tags' => 'required',
            'anonymous' => ''
        ]);
        $formFields['anonymous'] = isset($formFields['anonymous']);
        $formFields['user_id'] = rand(1, 7);
        if ($request->hasFile('attachments')) {
            $len = $request->file('attachments');
            $formFields['attachments'] = "";
            foreach ($request->file('attachments') as $key => $file) {
                if (($key + 1) < $len) $sep = ';';
                else $sep = '';
                $formFields['attachments'] .= $file->store('attachments', 'public') . $sep;
            }
        }

        Question::create($formFields);

        return redirect('/')->with(['message' => 'Question created successfully']);
    }
}
