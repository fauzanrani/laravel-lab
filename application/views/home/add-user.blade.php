@layout('master')


@section('content')
	<div class="home">
				<h2> {{ $title }} </h2>

				<p>
					 {{ $message }}
				</p>
				<p>
					<a href="{{ URL::base(); }}userpage" >Back to User Page</a>
				</p>

				<div class="horz-line"></div>

				<ul class="out-links">
					<li><a href="http://laravel.com">Official Website</a></li>
					<li><a href="http://forums.laravel.com">Laravel Forums</a></li>
					<li><a href="http://github.com/laravel/laravel">GitHub Repository</a></li>
				</ul>
			</div>
@endsection