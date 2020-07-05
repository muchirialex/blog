@extends('layouts.app')

@section('content')
    
<h1 id="page_title">Stuff I've Written</h1>

<div id="posts_wrapper" class="skinny_wrapper">
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="post">
                    <a href="/posts/{{$post->id}}">
                        <img src="/storage/cover_images/{{$post->cover_image}}">
                        <h2>{{$post->title}}</h2>
                    </a>
                <p class="date">{{$post->created_at->formatLocalized('%A, %B %d')}}</p>
                <hr>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p> No Posts found</p>
    @endif
</div>
@endsection