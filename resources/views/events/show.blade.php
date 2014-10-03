@extends('layouts.template')	
	@section('title')
		{!!$data->name!!}
	@stop

	@section('description')
		{!! Str::words($data->detail,'45','...') !!}
	@stop
	@section('content')

		<section class="content">

			<div class="row detailBG">
				<!-- left column -->
				<div class="large-6 columns">
					<h3><strong>{{$data->name}}</strong></h3>
				
					<p>{!! nl2br($data->detail)!!}</p>
					
					<hr />

					
				</div>
						
					
				<!-- Right column -->
				<div class="large-5 columns">
					<!-- nested columns -->
					<div class="row">
						
						<div class="small-12 columns">

							<h3><strong>LOCATION INFO</strong></h3>
						
							<address>
								{{$data->venue->venueName}} <br />
								{{$data->venue->address}}<br />
								{{$data->venue->city}}, {{$data->venue->state}} {{$data->venue->zip}}<br />
							</address>
						</div>
					</div>

					<div class="row">
						<div class="small-12 columns">
							<h3><strong>HOURS</strong></h3>
							<p class="highlight">{{$data->when->format('D M d')}} ({{$data->when->diffForHumans()}})<br />
							FROM: {{$data->when->format('h:i A')}}<br />
							TO:	{{$data->end->format('h:i A')}}
							<p/>
						</div>
					</div>

						<div class="row">
						<div class="small-12 columns">
							<h3><strong>COVER</strong></h3>
						
								<p class="highlight">{{$data->cover ? $data->cover : 'N/A'}}</p>
						</div>
					</div>
						<div class="row">
						<div class="small-12 columns">
							<h3><strong>TIX/MORE INFO</strong></h3>
								<p class="highlight">@if($data->info) <a href="{!!$data->info!!}">WEBSITE</a> @else NA @endif</p>
					</div>
				</div>
					<div class="row">
						<div class="small-12 columns">
							<h3><strong>FLYER/PHOTO</strong></h3>
							
							  @if($data->flyer)     
                        <img src="{{Cloudy::show($data->flyer, array('width' => 550, 'height' => 450, 'crop' => 'fill', 'radius' => 0))}}"> 
                         @else
                         {!!HTML::image('assets/images/noimage.png')!!}
                         
                         @endif
							
							
						</div>
					</div>

					<!-- end of nested columns -->
				</div>
			</div>

		</section>

	@stop

	@section('scripts')
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "d719c163-162f-4fa2-88a6-af5fa49d0147", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

@stop