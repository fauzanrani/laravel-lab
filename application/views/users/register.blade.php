@layout('master')


@section('content')
	<div class="row">
		<div class="span4 centerWrap">
			<div class="well">
				<legend>Please Sign In</legend>
				{{ Form::open('register')}}
				{{ Form::text('firstname', '', array('class'=>'span3','placeholder'=>'First Name'))}}
				{{ Form::text('lastname', '', array('class'=>'span3','placeholder'=>'Last Name'))}}
				{{ Form::text('username', '', array('class'=>'span3','placeholder'=>'Username'))}}
				{{ Form::text('email', '', array('class'=>'span3','placeholder'=>'Email Address'))}}
				{{ Form::password('password', array('class'=>'span3','placeholder'=>'Password'))}}
				{{ Form::submit('Register', array('class'=>'btn btn-warning'))}}
				<div class="second-action">
					Already have account? {{ HTML::link('login', 'Login here.', array('class'=>'loginlink'))}}
				</div>
				{{ Form::close()}}
			</div>
			
		</div>
	</div>
@endsection
