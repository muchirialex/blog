@extends('layouts.app')

@section('content')
<h1 id="page_title">New Project</h1>
{!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="skinny_wrapper wrapper_padding">
        {{Form::label('title', "Title")}}
        {{Form::text('title', '', ['placeholder' => 'Title'])}}
        <br>
        {{Form::label('content', "Write your article here")}}
        {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'placeholder' => 'Content'])}}
        <br>
        {{Form::label('link', "Link")}}
        {{Form::text('link', '', ['placeholder' => 'Project Link'])}}
        <br>
        {{Form::file('project_image')}}
        <br><br>

        {{Form::submit('submit')}}
    </div>
{!! Form::close() !!}
@endsection