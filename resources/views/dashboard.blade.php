@extends('layouts.app')

@section('content')
<div id="post_show_content" class="skinny_wrapper wrapper_padding">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <a href="/posts/create" class="create-button">Create Article</a>
    <h3>Your Articles</h3>
    <ul id="timeline">
        @if(count($posts) >0 )
            @foreach($posts as $post)
                <li class="listing clearfix">
                    <div class="image_wrapper">
                        <img src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="info">
                        <h2 class="post-title">{{$post->title}}</h2>
                    </div>
                    <a class="post-link" href="/posts/{{$post->id}}/edit">Edit</a>
                    <a class="post-link" href="/posts/del/{!!$post['id']!!}" onclick='return confirm("Are you sure you want to delete ?")'>Delete
                        {!! Form::open(['url' => ['posts/del', $post['id']], 'method' => 'delete']) !!} {!! Form::close() !!}
                    </a>
                </li>
            @endforeach
        
        @else
            <p>You have no articles</p>
        
        @endif
    </ul>
    
</div>
@endsection
