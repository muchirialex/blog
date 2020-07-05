@extends('layouts.app')

@section('content')
<h1 id="page_title">Edit Article</h1>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="skinny_wrapper wrapper_padding">
        {{Form::label('title', "Title")}}
        {{Form::text('title', $post->title, ['placeholder' => 'Title'])}}

        {{Form::label('content', "Write your article here")}}
        {{Form::textarea('content', $post->content, ['id' => 'article-ckeditor', 'placeholder' => 'Content'])}}
        <br>
        {{Form::file('cover_image')}}
        <br><br>
        {{Form::submit('submit')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
{!! Form::close() !!}
@endsection