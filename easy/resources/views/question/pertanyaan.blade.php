@extends('../layouts.dashboard')

@section('title', 'Comment Jawaban')

@push('head-script')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')

<div style="margin-top: 50px;">
    <h3>Comment</h3>
    @foreach ($question->pcomment as $comment)
    <div class="card w-100">
        <div class="row">
            <div class="col-lg-1">
                <div style=" text-align: center; justify-content: center; padding: 9px;">
                    <p style="font-size: 16px;">0 Votes</p>
                    <p style="font-size: 12px;">0 Coment</p>
                    <p style="font-size: 16px;">0 Views</p>
                </div>
            </div>
            <div class="col-lg-11">
                <div class="card-body">
                    <p class="card-text">{!! $comment->comment !!}</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
    @endforeach

</div>


<div style="margin-top: 50px;">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment" class="form-control-label" style="font-size: 24px;">comment about this question</label>
            <textarea name="comment" id="comment" rows="5" class="ckeditor form-control my-editor">
            {{ old('comment') }}</textarea>
            <small id="passwordHelpBlock" class="form-text text-muted">
                include comments about this question
            </small>
        </div>
        <input type="text" value="{{$question->id}}" name="question_id" style="display: none;"></input>
        <input type="text" value="{{$question->user->id}}" name="user_id" style="display: none;"></input>
        <button type="submit" class="btn btn-primary">comment</button>
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