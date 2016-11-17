<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel/Vue.js</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>

    <div id="app"></div>

    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

    <script src="/js/app.js"></script>
    
    @if ( Config::get('app.debug') )
  <script type="text/javascript">
      document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
  </script>
    @endif
    
    </body>
</html>
