@extends('layouts.app')

@section('content')
<h1 id="page_title">New Article</h1>
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="skinny_wrapper wrapper_padding">
        {{Form::label('title', "Title")}}
        {{Form::text('title', '', ['placeholder' => 'Title'])}}

        {{Form::label('content', "Write your article here")}}
        {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'placeholder' => 'Content'])}}
        <br>
        {{Form::file('cover_image')}}
        <br><br>

        {{Form::submit('submit')}}
    </div>
{!! Form::close() !!}
@endsection