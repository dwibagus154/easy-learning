<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Pcomment;
use Illuminate\Http\Request;

class CommentPertanyaanController extends Controller
{
    public function show(Question $question)
    {
        return view('question.pertanyaan', compact('question'));
    }
    public function store(Request $request)
    {
        //dd(auth()->id());

        $validatedData = $request->validate([
            'comment' => 'required'
        ]);

        Pcomment::create($request->all());
        return redirect('/question')->with('success', 'Jawaban Berhasil Dibuat!');
    }
}
