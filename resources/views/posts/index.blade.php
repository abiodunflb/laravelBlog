@extends('layouts.app')


@section('content')



<div class="row">
    <div class="col-md-12">
        <h2>All Posts</h2>
            <a href="{{route('posts.create')}}" class="btn btn-sm btn-success">Create Post</a><br><br>
            @include('includes.alert')

        @forelse ($posts as $post)
        <div class="card mb-3">

            <div class="card-header">
                {{$post->title}}
                <div class="float-right">
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-success">View</a>
                </div>

            </div>

            <div class="card-body">
                {{$post->body}}
            </div>

            <div class="card-footer">
                By {{$post->user->name}} {{$post->created_at->diffForHumans()}}
            </div>
        </div>

        @empty

        No Post

        @endforelse

        {{$posts->links()}}


    </div>
</div>

@endsection
