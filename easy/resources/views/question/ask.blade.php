@extends('../layouts.dashboard')

@section('title', 'Ask')

@push('head-script')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif

<h2>Ask a Public Question</h2>
<div class="container">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="question" class="form-control-label">Title</label>
            <input type="text" name="question" id="question" value="{{ old('question') }}" class="form-control @error('question') is-invalid @enderror" placeholder="Masukkan Inti Pertanyaan" />
            <small id="passwordHelpBlock" class="form-text text-muted">
                Be specific and imagine you’re asking a question to another person
            </small>
        </div>
        <div class="form-group">
            <label for="description" class="form-control-label">Deskription</label>
            <textarea name="description" id="description" rows="5" class="ckeditor form-control my-editor">
            {{ old('description') }}</textarea>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Include all the information someone would need to answer your question
            </small>
        </div>
        <div class="form-group">
            <label for="concept" class="form-control-label">Type</label>
            <div class="col-md-6" style="margin-left: -14px;">
                <input type="text" name="concept" id="concept" rows="3" class="form-control">
                {{ old('concept') }}</input>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Program Language used
                </small>
            </div>
        </div>
        <input type="text" value="0" name="isvote" style="display: none;"></input>
        <input type="text" value="{{ $user['id']}}" name="user_id" style="display: none;"></input>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection

@push('end-script')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush