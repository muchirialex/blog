@extends('layouts.app')

@section('content')
<h1 id="page_title">Edit Project</h1>
{!! Form::open(['action' => ['ProjectsController@update', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="skinny_wrapper wrapper_padding">
        {{Form::label('title', "Title")}}
        {{Form::text('title', $project->title, ['placeholder' => 'Title'])}}

        {{Form::label('content', "Write your article here")}}
        {{Form::textarea('content', $project->content, ['id' => 'article-ckeditor', 'placeholder' => 'Content'])}}
        <br>
        {{Form::label('link', "Link")}}
        {{Form::text('link', $project->link, ['placeholder' => 'Project Link'])}}
        <br>
        {{Form::file('project_image')}}
        <br><br>
        {{Form::submit('submit')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
{!! Form::close() !!}
@endsection