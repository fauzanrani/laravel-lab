@layout('master')


@section('content')
	<div class="contentWrapper">
		<pre>Welcome to your profile page, <strong>{{ $firstname ." ".$lastname }}</strong> </pre>
	</div>
@endsection
