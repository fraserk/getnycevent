@extends('layouts.template')
	@section('content')
		<section class='content'>
			<div class='row'>
				<div class="small-6 columns small-centered panel callout">
						<h4>Login</h4>
						<hr />
						@include('partials.errors')
						{!!Form::open()!!}
							{!!Form::label('email','Email Address.')!!}
							{!!Form::email('email')!!}

							{!!Form::label('password','Password.')!!}
							{!!Form::password('password')!!}


							{!!Form::submit('Login',['class'=>'button small radius'])!!} or  {!!HTML::link('auth/register','Register.')!!}
							


						{!!Form::close()!!}
				</div>
			</div>

		</section>
	@stop