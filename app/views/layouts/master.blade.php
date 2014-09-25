<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="{{ $page['charset'] }}">
<title>{{ $page['title'] }} - {{$page['siteName']}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
{{ HTML::style('css/main.css') }}
{{ HTML::script('js/jquery.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/underscore-min.js') }}
{{ HTML::script('js/main.js') }}
</head>
<body id="top">
    @include('includes.navigation')
    <div id="main" class="container theme-showcase" role="main">

    	<div id="successPanel" class="alert alert-success dn"><span class="glyphicon glyphicon-ok"></span> <strong class="msg"></strong></div>
    	<div id="warningPanel" class="alert alert-warning dn"><span class="glyphicon glyphicon-warning-sign"></span> <strong class="msg"></strong></div>

        @section('pageHeader')
        <div class="page-header">
            {{ $page['title'] }}
        </div>
        @show

        @yield('content')
    </div>
</body>
</html>
