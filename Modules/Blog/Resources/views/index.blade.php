@extends('blog::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('blog.name') !!}
        <br /><br /><a href='{{url("blog/add") }}'>[ADD]</a>
    </p>
    <div style="background-color: pink">
        @foreach($blogposts as $post)
            <h1><a href='{{url("blog/edit/$post->id") }}'>{{$post->title}}</a></h1>
            <p>{{ $post->desc}} <a href='{{url("blog/delete/$post->id") }}' style="color: red;">[delete]</a></p> 
        @endforeach
    </div>
@endsection
