@extends('layouts.app')

@section('content')
    
<h1 id="page_title">Stuff I've Built</h1>

<div id="posts_wrapper" class="skinny_wrapper">
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <div class="post">
                    <a href="/projects/{{$project->id}}">
                        <img src="/storage/project_images/{{$project->project_image}}">
                        <h2>{{$project->title}}</h2>
                    </a>
                <p class="date">{{$project->created_at->formatLocalized('%A, %B %d')}}</p>
                <hr>
            </div>
        @endforeach
        {{$projects->links()}}
    @else
        <p> No projects found</p>
    @endif
</div>
@endsection