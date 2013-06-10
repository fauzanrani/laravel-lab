@layout('master')


@section('content')
	<div class="home">
				<h2> {{ $greeting." ".$thing."." }} </h2>

				<p>
					You've landed on custom home page. <br/>
					The item is : <br/> 
					@forelse($items as $item)
						{{ $item }} <br/>
					@empty
						There are no items
					@endforelse

				</p>


				<h2>Create something beautiful.</h2>

				<p>
					Now that you're up and running, it's time to start creating!
					Here are some links to help you get started:
				</p>

				
			</div>
@endsection