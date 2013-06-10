@layout('master')


@section('content')
				<h2> {{ $title }} </h2>

				<p>
					 @foreach( $users as $user )
					 	{{ "<p>" }}
					 	{{ "Username : ".$user->username."<br/>" }}
					 	{{ "Email : ".$user->email }}
					 	{{ "<p/>" }}
					 @endforeach

				</p>
				<p>
					<a href="{{ URL::base(); }}add-user" >Add User</a>
				</p>

				<div class="horz-line"></div>

				<ul class="out-links">
					<li><a href="http://laravel.com">Official Website</a></li>
					<li><a href="http://forums.laravel.com">Laravel Forums</a></li>
					<li><a href="http://github.com/laravel/laravel">GitHub Repository</a></li>
				</ul>
@endsection