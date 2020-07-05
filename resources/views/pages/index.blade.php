@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper_padding clearfix">
        <div class="col-1 about homepage_content">
            <h2>About</h2>
            <hr>
            <p>I'm so called an <b>engineer</b>, a <b>'cartoonist'</b> once in a while.</p>
            <p>Unicorn engineer with 4 years experience, plays community sports, 
            and designs cutting-edge software for problem solving.</br><strike>When</strike> <b>I</b> <strike>am writing</strike> <b>code</b>, <strike>I would make sure that it is written</strike> <b>efficiently.</b></p>
            <p>Hard work beats talent when talent fails to work hard.</p>
        </div>

        <div class="col-2 homepage_content">
            <h2>Stuff I've written</h2>
            <hr>
            @foreach($posts as $post)
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <p class="date">{{$post->created_at->formatLocalized('%A, %B %d')}}</p>
            @endforeach
        </div>

        <div class="col-3 homepage_content">
            <h2>Stuff I've Built</h2>
            <hr>
            @foreach($projects as $project)
                <h3><a href="/projects/{{$project->id}}">{{$project->title}}</a></h3>
                <p class="date">{{$project->created_at->formatLocalized('%A, %B %d')}}</p>
            @endforeach
        </div>
    </div>

    <section class="clearfix tab">
        <div class="wrapper-tab">
            <div class="tab-row">
                <div class="tab-1">
                    <h3>Find and Live off your passion</h3>
                    <p>If you get good at something, you’ll be in demand. You can then work for a company if you like. I recommend you try doing it on your own unless you need equipment you can’t afford or get an offer you can’t refuse.</p>
                </div>

                <div class="tab-2 js-tilt" data-tilt>
                        <img src="/images/me2.png">
                </div>
            </div>
        </div>
    </section>

    <section class="clearfix tab">
        <div class="wrapper-tab">
            <div class="tab-row">
                <div class="inverse-tab-1 js-tilt" data-tilt>
                        <img src="/images/illustration-stream.svg">
                </div>

                <div class="inverse-tab-2">
                    <h3>One man’s magic = another man’s engineering</h3>
                    <p>Engineering problems are under-defined, there are many solutions, good, bad and indifferent. The art is to arrive at a good solution. This is a creative activity, involving imagination, intuition and deliberate choice.</p>
                </div>
            </div>
        </div>
    </section>
@endsection