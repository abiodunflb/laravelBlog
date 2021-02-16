@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Edit Post</h2>
                @include('includes.alert')
            </div>
            <div class="card-body">
                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="title">body</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" name="image" onchange="previewFile(this)">
                        <img src="{{asset('images')}}/{{$post->image}}" id="imgPreview" style="max-width: 130px; margin-top:20px;"  alt="Image">
                    </div>

                    <button type="submit" class="btn btn-success">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#imgPreview').attr("src", reader.result);
                // $('#imgPreview').css("display", "block");
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
