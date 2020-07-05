@extends('layouts.app')

@section('content')
<div id="post_show_content" class="skinny_wrapper wrapper_padding">
    <header>
        <div id="content">
            <img src="/storage/project_images/{{$project->project_image}}">
        </div>
        <p class="date">{{$project->created_at->formatLocalized('%A, %B %d')}}</p>
        <h1>{{$project->title}}</h1>
        <hr>
    </header>    

    <div id="content">
        <p>{!!$project->content!!}</p>

        <div class="project_button_wrapper">
			<a href="https://{{$project->link}}" class="project_button" target="_blank">Visit{{$project->title}}</a>
		</div>
    </div>

    @if(!Auth::guest())
        @if(Auth::user()->id == $project->user_id)
            <div id="admin_links">
                <a href="/projects/{{$project->id}}/edit">Edit</a>
                <a href="/projects/del/{!!$project['id']!!}" onclick='return confirm("Are you sure you want to delete ?")'>Delete
                    {!! Form::open(['url' => ['projects/del', $project['id']], 'method' => 'delete']) !!} {!! Form::close() !!}
                </a>
            </div>
        @endif
    @endif
</div>
@endsection