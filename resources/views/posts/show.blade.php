@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-md-6">
        <img src="{{asset('images')}}/{{$post->image}}" alt="image" style="max-width: 500px">
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                @include('includes.alert')
                <h2>{{$post->title}}</h2>
                <p>By {{$post->user->name}} {{$post->created_at->diffForHumans()}}</p>
            </div>

            <div class="card-body">
                {{$post->body}}
            </div>



            <div class="card-footer">
                <form action="{{route('posts.destroy', $post->id)}}" method="POST" class="form float-right">
                    @csrf
                    @method('DELETE')

                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection
