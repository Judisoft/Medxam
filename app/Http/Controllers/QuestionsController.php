<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Requests\QuestionsRequest;
use App\Models\Question;
use Auth;
use File;
use Response;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $biology_questions = Question::where('subject', 'biology')->get();
        $chemistry_questions = Question::where('subject', 'chemistry')->get();
        $physics_questions = Question::where('subject', 'biology')->get();
        $general_knowledge_questions = Question::where('subject', 'physics')->get();
        $english_questions = Question::where('subject', 'english')->get();
        $french_questions = Question::where('subject', 'french')->get();
        


        //return dd($jsonFile);
        return view('questions.index', compact('questions', 'biology_questions', 'chemistry_questions', 'physics_questions', 'general_knowledge_questions', 'english_questions', 'french_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'content' => 'required',
                'subject' => 'required',
                'topic' => 'required',
                'exam_year' => 'required',
                'A' => 'required',
                'B' => 'required',
                'C' => 'required',
                'D' => 'required',
                'answer' => 'required',
                'image' =>  'nullable|file|image|mimes:jpeg,png,gif,webp|max:5000'
    
            ]
        );
        // Handle file upload
        if($request->image != ''){
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //Get just extension
        $extension=$request->file('image')->getClientOriginalExtension();
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //Upload file
        $path=$request->file('image')->storeAs('public/question_images', $fileNameToStore);

        }
        $question = new Question;
        $question->subject = $request->input('subject');
        $question->content = $request->input('content');
        $question->topic = $request->input('topic');
        $question->exam_year = $request->input('exam_year');
        $question->A = $request->input('A');
        $question->B = $request->input('B');
        $question->C = $request->input('C');
        $question->D = $request->input('D');
        $question->answer = $request->input('answer');
        $question->typed_by = Auth::user()->name;
        $question->image = $fileNameToStore; // [alternatice] $request->file('image')->store('photos');
        $question->save();
        //dd($question);
        return back()->with('success', "Question uploaded successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        {
            $validated = $request->validate(
                [
                    'content' => 'required',
                    'subject' => 'required',
                    'topic' => 'required',
                    'exam_year' => 'required',
                    'A' => 'required',
                    'B' => 'required',
                    'C' => 'required',
                    'D' => 'required',
                    'answer' => 'required',
                    'image' =>  'nullable|file|image|mimes:jpeg,png,gif,webp|max:5000'
        
                ]
            );
            // Handle file upload
            if($request->image != '')
            {

                //code for remove old file
                if($question->image != ''  && $question->image != null){
                    $old_file = $request->file('image')->storeAs('public/question_images', $question->image);
                    unlink($old_file);
                }
                //Upload file
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                //Get just filename
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
                $extension=$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $path=$request->file('image')->storeAs('public/question_images', $fileNameToStore);

                //for update in table
                $question->update(['image' => $fileNameToStore]);
                    
            }
            $question = new Question;
            $question->subject = $request->input('subject');
            $question->content = $request->input('content');
            $question->topic = $request->input('topic');
            $question->exam_year = $request->input('exam_year');
            $question->A = $request->input('A');
            $question->B = $request->input('B');
            $question->C = $request->input('C');
            $question->D = $request->input('D');
            $question->answer = $request->input('answer');
            $question->typed_by = Auth::user()->name;
            $question->image = $fileNameToStore; // [alternatice] $request->file('image')->store('photos');
            $question->save();
            //dd($question);
            return back()->with('success', "Question updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download()
    {
        $questions = Question::all()->toJson();
        $jsonFile = fopen("questions.json", "w");
        fwrite($jsonFile, $questions);
        return Response::download(public_path('questions.json'));
    }
}
