@extends('layouts.template')
	@section('content')
		<section class='content'>
			<div class='row'>
				<div class="small-6 columns small-centered panel callout">
						<h4>Register</h4>
						<hr />
						@if($errors->any)
							<ul class="no-bullet alert">
							@foreach($errors->all() as $error)
								<li>{!!$error!!}</li>
							@endforeach
							<ul>
						@endif
						{!!Form::open()!!}
							{!!Form::label('email','Email Address.')!!}
							{!!Form::email('email')!!}

							{!!Form::label('password','Password.')!!}
							{!!Form::password('password')!!}

							{!!Form::label('password_confirmation','Verify Password.')!!}
							{!!Form::password('password_confirmation')!!}

							{!!Form::submit('create',['class'=>'button small radius'])!!} or  {!!HTML::link('auth/login','Login here.')!!}
							


						{!!Form::close()!!}
				</div>
			</div>

		</section>
	@stop