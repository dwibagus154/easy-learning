<?php

namespace App\Http\Controllers;

use App\User;
use App\Answer;
use Illuminate\Support\Facades\Auth;
//use App\Pcomment;
use App\Jcomment;
use Illuminate\Http\Request;

class CommentJawabanController extends Controller
{
    public function show(Answer $answer)
    {
        return view('question.jawaban', compact('answer'));
    }
    public function store(Request $request)
    {
        //dd(auth()->id());

        $validatedData = $request->validate([
            'comment' => 'required'
        ]);

        Jcomment::create($request->all());
        return redirect('/question')->with('success', 'Jawaban Berhasil Dibuat!');
    }
}
