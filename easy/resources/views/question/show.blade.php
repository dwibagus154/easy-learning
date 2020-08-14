@extends('../layouts.dashboard')

@section('title', 'Show')

@section('content')

<div>
    <h2>{{ $question["question"] }}</h2>

</div>

<div>
    <h6>Deskripsi</h6>
    <hr>
    <div class="container">
        <h3>{{$question["description"]}}</h3>
    </div>
</div>

<div>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="answer" class="form-control-label">Jawabanmu</label>
            <textarea name="answer" id="answer" rows="5" class="ckeditor form-control">
            {{ old('answer') }}</textarea>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Berisi Jawaban pada Pertanyaan yang ditanyakan
            </small>
        </div>
        <button type="submit" class="btn btn-primary">Jawab</button>
    </form>
</div>

@endsection