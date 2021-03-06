<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth', ['except' => ['index', 'show']]);
     }
    public function index()
    {
        /* Debugging laravel query 
        \DB::enableQueryLog();
        view('questions.index', compact('questions'))->render();
        dd(\DB::getQueryLog());
        */
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
       $request->user()->questions()->create($request->only('title', 'body'));
       return redirect()->route('questions.index')->with('success', 'Great, Your question has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // USING GATE FOR SECURITY
        // if(\Gate::allows('update-question', $question)) {
        //     return view("questions.edit", compact('question'));
        // }
        // abort(403, "Access denied");
        
        $this->authorize("update", $question);
        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));

        if ($request->expectsJson()) {
            return response()->json([
                'message' => "Great, Your question has been updated.",
                'body_html' => $question->body_html
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Great, Your question has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize("delete", $question);
        $question->delete();
        
        if ($request->expectsJson()) {
            return response()->json([
                'message' => "Great, Your question has been deleted.",
            ]);
        }

        return redirect('/questions')->with('success', 'Your question has been deleted.');
        //if(\Gate::allows('delete-question', $question)) {
        //    $question->delete();
        //    return redirect('/questions')->with('success', 'Your question has been deleted.');
        //}
        //abort(403, "Access denied");
    }
}
