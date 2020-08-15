@extends('../layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif


@if ($questions)
<div>anjing</div>
@endif


<div class="d-flex justify-content-between" style="margin-bottom: 50px;">
    <h1>Semua Pertanyaan</h1>
    <a href="/question/ask" class="badge badge-primary" style="width: 200px; height: 40px; font-size: 20px; justify-content: center; padding-top: 8px;">Membuat Pertanyaan</a>
</div>



@foreach ($questions as $question)
<div class="card w-100">
    <div class="row">
        <div class="col-lg-1">
            <div style=" text-align: center; justify-content: center; padding: 9px;">
                <p style="font-size: 16px;">0 Votes</p>
                <p style="font-size: 12px;">0 Answers</p>
                <p style="font-size: 16px;">0 Views</p>
            </div>
        </div>
        <div class="col-lg-11">
            <div class="card-body">
                <a href="question/{{ $question['id'] }}">
                    <h5 class="card-title">{{ $question["question"]}}</h5>
                </a>
                <p class="card-text">{!! $question["description"] !!}</p>
                <button style="width: 50px; height:20px; color: grey; justify-content: center; padding-top: -5px; font-size: 12px;">{{ $question["concept"] }}</button>
                <br>
                <a href="/comment/pertanyaan/{{$question->id}}"><button class="small btn btn-secondary">Comment</button></a>
            </div>
        </div>
    </div>
    <hr>
</div>

@endforeach

@endsection