@extends('layouts.template')
	@section('content')
	<section class="content">
		<div class="row">
			<div class="small-12 columns panel callout">
				<h4 class="subheader">Create Event</h4>
				<hr />
				@include('partials.errors')
				{!!Form::open(['files'=>true]) !!}
					@include('partials.eventForm')
				{!!form::close() !!}
			</div>
		</div>
	</section>
<div id="addVenue" class="reveal-modal" data-reveal>
  @include('venues.create')
  <a class="close-reveal-modal">&#215;</a>
</div>
	@stop

 @section('scripts')

   @include('partials.venueJS')

   <script>
   		jQuery('#when').datetimepicker({
   			minDate:'-1970/01/01',//yesterday is minimum date(for today use 0 or -1970/01/01)
   			hours12: false,
   			yearstart: '2014',
   			formatTime: 'H:i',
   			format: 'Y-m-d H:i:s'
   		});

   		jQuery('#end').datetimepicker({
   			minDate:'-1970/01/01',//yesterday is minimum date(for today use 0 or -1970/01/01)
   			hours12: false,
   			yearstart: '2014',
   			formatTime: 'H:i',
   			format: 'Y-m-d H:i:s'
   			
   		});
   </script>
 @stop