<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{

    public function store(Request $request)
    {
        //dd(auth()->id());

        $validatedData = $request->validate([
            'answer' => 'required'
        ]);

        Answer::create($request->all());
        // $answer = new answer;
        //     $answer->user_id               = Auth::id();
        //     $answer->isvote                = $request->isvote;
        //     $answer->answer                = $request->answer;
        //     $answer->question_id           = $request->question_id;
        // $answer->save();
        //return $answer;
        return redirect('/question')->with('success', 'Jawaban Berhasil Dibuat!');
    }
}
