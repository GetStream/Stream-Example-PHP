<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Stream Framework example | Pinterest esque example app</title>

        <script type="text/javascript">
        if (window.location.protocol != "http:")
            window.location.href = "http:" + window.location.href.substring(window.location.protocol.length);
        </script>

        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="cleartype" content="on">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('images/favicon-144x144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('images/favicon-114x114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('images/favicon-72x72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon-57x57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}">
        <link rel="logo" type="image/svg" href="{{ URL::asset('images/logo.svg') }}">

        <meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon-144x144-precomposed.png') }}">
        <meta name="msapplication-TileColor" content="#222222">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/x-scss" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,500' rel='stylesheet' type='text/css'>
    </head>
    <body>
        @section('nav')
            @include('_navigation', array('location'=>'trending'))
        @show
        <section>
            <article>
                @section('info')
                    <div class="jumbotron">
                        <div class="container">
                            <h1>Stream in action</h1>
                            <p>
                                Welcome to the Pinterest esque example app. We've conveniently logged you in as the admin user.
                                Also admin is a slightly narcissistic user and follows her own account.
                                
                                When you pin items on this trending page, you'll see them appear in the feeds of your followers.
                                Pin a few items and have a look at the Flat and Aggregated timelines pages.
                            </p>
                            <p>
                                <a class="btn btn-primary btn-lg" href="https://getstream.io" role="button">
                                    <i class="icon-help-circle"></i> GetStream
                                </a>
                            </p>
                        </div>
                    </div>
                @show

                @yield('content')

            </article>
        </section>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

        <script type="text/javascript">
            var queries = {{ json_encode(DB::getQueryLog()) }};
            console.log('/****************************** Database Queries ******************************/');
            console.log(' ');
            $.each(queries, function(id, query) {
                console.log('   ' + query.time + ' | ' + query.query);
            });
            console.log(' ');
            console.log('/****************************** End Queries ***********************************/');
        </script>
    </body>
</html>