@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $service->title }} </div>

                <div class="panel-body">
                    {{ $service->description }} <br>
                    @if($service->status)
                        Service is active
                    @else
                        Service is retired
                    @endif

                    <br>
                </div>

                <p class="pull-right"><a href="{{ route('new_message', $service->user->id) }}">New message to service owner</a> | <a href="{{ route('show_users_services', $service->user->id) }}">Show another user services</a></p>
            </div>

            <div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */

    var disqus_config = function () {
        this.page.url = "/services/{{ $service->id }}";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{ $service->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
        var d = document, s = d.createElement('script');

        s.src = '//EXAMPLE.disqus.com/embed.js';  // IMPORTANT: Replace EXAMPLE with your forum shortname!

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        </div>
    </div>
</div>
@endsection
