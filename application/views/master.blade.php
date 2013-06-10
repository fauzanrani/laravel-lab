<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery-1.8.2.min.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	<link rel="shortcut icon" href="<?php echo URL::base();?>img/favicon.png">

<style type="text/css">

header{
	overflow: auto;
}

ul{
	list-style: none;
	padding: 0px;
}
ul li{
	width: 80px;
	float: left;
}

ul li a{
}

.horz-line{
	height: 1px;
	background: #ddd;
	margin-bottom: 20px;
}

.centerWrap{
	float: none;
	margin: 20px auto 20px;
}

</style>

</head>
<body>
	<div class="wrapper">

		<header>
			<div class="navbar">
				<div class="navbar-inner">
						{{ HTML::link('/','Laravel Lab', array('class'=>'brand')) }}
					<ul class="nav pull-right">
						@if(Auth::user())
						<li>{{ HTML::link('logout','Logout') }} </li>
						@else
						<li>{{ HTML::link('login','Login') }} </li>
						@endif
					</ul>
				</div>
					

			</div>
			<h1>Laravel Lab</h1>
			<h3>A lab build to experiment Laravel</h3>

			<p class="intro-text" style="margin-top: 45px;">
				<ul>
					<li><a href="{{ URL::base(); }}" >Home</a></li>
					<li><a href="{{ URL::base(); }}about/" >About</a></li>
					<li><a href="{{ URL::base(); }}userpage/" >Users</a></li>
					<li><a href="{{ URL::base(); }}posts/" >Posts</a></li>
					<li><a href="{{ URL::base(); }}authors/" >Authors</a></li>
					<li><a href="{{ URL::base(); }}dbtest/" >DbTest</a></li>

				</ul>
			</p>
		</header>
		<div role="main" class="main">
				@include('plugins.status')
				@yield('content')
		</div>

		<div class="horz-line"></div>
		<ul class="out-links">
			<li><a href="http://laravel.com">Official Website</a></li>
			<li><a href="http://forums.laravel.com">Laravel Forums</a></li>
			<li><a href="http://github.com/laravel/laravel">GitHub Repository</a></li>
		</ul>
	</div>

	{{ HTML::script('js/custom-script.js') }}
</body>
</html>
