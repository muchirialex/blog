@extends('layouts.app')

@section('content')
<div id="post_show_content" class="skinny_wrapper wrapper_padding">
    <header>
        <div id="content">
            <img src="/storage/cover_images/{{$post->cover_image}}">
        </div>
        <p class="date">{{$post->created_at->formatLocalized('%A, %B %d')}}</p>
        <h1>{{$post->title}}</h1>
        <hr>
    </header>    

    <div id="content">
            <p>{!!$post->content!!}</p>
    </div>
    
    <div id="disqus_thread"></div>
        <script>
        
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://muchirialex-me-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div id="admin_links">
                <a href="/posts/{{$post->id}}/edit">Edit</a>
                <a href="/posts/del/{!!$post['id']!!}" onclick='return confirm("Are you sure you want to delete ?")'>Delete
                    {!! Form::open(['url' => ['posts/del', $post['id']], 'method' => 'delete']) !!} {!! Form::close() !!}
                </a>
            </div>
        @endif
    @endif
</div>
@endsection