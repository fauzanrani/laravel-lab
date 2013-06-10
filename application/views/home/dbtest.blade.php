@layout('master')


@section('content')
				<h2> Database Test </h2>

				<p>	<pre>
					 {{ print_r($post) }}
					</pre>
				</p>

@endsection