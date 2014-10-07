@extends('layouts.template')
	@section('content')
		<section class="content">
		
			<div class="row">	
					<div class="small-12 columns panel callout">
						<h4 class="subheader">Active Events</h4>
						<small>You active upcomming events.</small>
						<hr />
						<table role="grid">
						  <thead>
						    <tr>
						      <th width="200">Event name</th>
						      <th>Event Venue</th>
						      <th width="150">Event Date</th>
						      <th width="100">Edit Event</th>
						      <th width="150">Delete Event</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach($data as $event)
						    <tr>
						      <td>{!!$event->name!!}</td>
						      <td>{!!$event->venue->venueName!!}</td>
						      <td>{!!$event->when->format('M-d')!!}</td>
						      <td><a href="{!!URL::route('edit.event',[$event->slug])!!}"><i class="fi-pencil"></i> </a></td>
						        <td>{!!Form::open(['route'=>['delete.event',$event->slug],'method'=>'delete'])!!}
						          {!!form::submit('DELETE',['class'=>'button tiny radius alert'])!!} {!!Form::close()!!} </td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
					</div>
			</div>

		</section>

		
	@stop