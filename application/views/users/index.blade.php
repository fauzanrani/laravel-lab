@layout('master')


@section('content')
	<div class="row">
		<div class="span4 centerWrap">
			<div class="well">
				<legend>Please Sign In</legend>
				{{ Form::open('login')}}
				{{ Form::text('email', '', array('class'=>'span3','placeholder'=>'Email Address'))}}
				{{ Form::password('password', array('class'=>'span3','placeholder'=>'Password'))}}
				{{ Form::submit('Sign In', array('class'=>'btn btn-success'))}}
				{{ HTML::link('register', 'Register', array('class'=>'btn'))}}
				{{ Form::close()}}
			</div>
			
		</div>
	</div>
@endsection
