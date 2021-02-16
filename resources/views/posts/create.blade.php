@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Create Post</h2>
                @include('includes.alert')
            </div>
            <div class="card-body">
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">body</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" name="image" onchange="previewFile(this)">
                        <img src="" id="imgPreview" style="max-width: 130px; margin-top:20px; display:none;"  alt="Image">
                    </div>

                    <button type="submit" class="btn btn-success">Add Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile(input){

        // let getFile = document.getElementById('image');
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#imgPreview').attr("src", reader.result);
                $('#imgPreview').css("display", "block");
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
