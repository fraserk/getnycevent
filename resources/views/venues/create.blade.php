<div class="row">

	<div class="small-12 columns">
		<h1>Add New Venue</h1>
		<hr />
		@include('partials.errors')
		<div id="error"></div>
	</div>

</div>

{!!Form::open(['class'=>'add_venue'])!!}
	<div class="row">
		<div class="small-4 columns">
			{!!Form::label('venueName','Venue Name:',['class'=>'right inline'])!!}
		</div>
		<div class="small-4 columns pull-4">
			{!!Form::text('venueName',null,['id'=>'right-label'])!!}
		</div>
	</div>

	<div class="row">
		<div class="small-4 columns">
			{!!Form::label('address','Venue Address:',['class'=>'right inline'])!!}
		</div>
		<div class="small-4 columns pull-4">
			{!!Form::text('address',null,['id'=>'right-label'])!!}
		</div>
	</div>

	<div class="row">
		<div class="small-4 columns">
			{!!Form::label('city','City/State/Zip:',['class'=>'right inline'])!!}
		</div>
		<div class="small-3 columns">
			{!!Form::text('city',null,['id'=>'right-label','placeholder'=>'Venue City'])!!}
		</div>

		<div class="small-3 columns">
			{!!Form::text('state',null,['id'=>'right-label','placeholder'=>'Venue State'])!!}
		</div>

		<div class="small-2 columns">
			{!!Form::text('zip',null,['id'=>'right-label','placeholder'=>'Venue Zipcode'])!!}
		</div>
	</div>

	<div class="row">
		<div class="small-5 columns push-4">
			{!!Form::submit('Save Venue',['class'=>'button radius ','id'=>'submit'])!!}
		</div>
	</div>

{!!Form::close()!!}