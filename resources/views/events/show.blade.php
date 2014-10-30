@extends('layouts.template')	
	@section('title')
		{!!$data->name!!}
	@stop

	@section('description')
		{!! Str::words($data->detail,'45','...') !!}
	@stop
	@section('content')

		<section class="content">

			<div class="row">
				<!-- left column -->
				<div class="large-6 medium-5 columns">
					<div class="custom_head_panel">
						<h4>EVENT DETAIL</h4>
					</div>
					<div class="panel callout">

					<h3><strong>{{$data->name}}</strong></h3>
				
					<p>{!! nl2br($data->detail)!!}</p>
					
					
				</div>
			</div>
						
					
				<!-- Right column -->
				<div class="large-5 medium-5 columns">
					<!-- nested columns -->
					<div class="row">
						
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>EVENT LOCATION</h4>
							</div>
						<div class="panel callout">
							
						
							<address>
								{{$data->venue->venueName}} <br />
								{{$data->venue->address}}<br />
								{{$data->venue->city}}, {{$data->venue->state}} {{$data->venue->zip}}<br />
							</address>
						</div>
						</div>
					</div>

					<div class="row">
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>WHEN?</h4>
							</div>
						<div class="panel callout">
							<p class="highlight">{{$data->when->format('D M d')}} ({{$data->when->diffForHumans()}})<br />
							FROM: {{$data->when->format(' D h:i A')}}<br />
							TO:	 {{$data->end->format(' D h:i A')}}
							<p/>
						</div>
					</div>
					</div>

						<div class="row">
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>COVER</h4>
							</div>
						<div class="panel callout">
						
								<p class="highlight">{{$data->cover ? $data->cover : 'N/A'}}</p>
						</div>
					</div>
					</div>
						<div class="row">
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>MORE INFO</h4>
							</div>
						<div class="panel callout">
								<p class="highlight">@if($data->info) <a href="{!!$data->info!!}">WEBSITE</a> @else NA @endif</p>
					</div>
				</div>
				</div>
					<div class="row">
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>FLYER/PHOTO</h4>
							</div>
						<div class="panel callout">
							
							  @if($data->flyer)     
                        <img src="{{Cloudy::show($data->flyer, array('width' => 550, 'height' => 450, 'crop' => 'fill', 'radius' => 0))}}"> 
                         @else
                         {!!HTML::image('assets/images/noimage.png')!!}
                         
                         @endif
							
							
						</div>
					</div>
					</div>

						<div class="row">
						<div class="small-12 columns">
							<div class="custom_head_panel">
								<h4>SHARE EVENT</h4>
							</div>
						<div class="panel callout">
							<!-- twitter share -->
						<ul class="inline-list">
							
							<li>
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="getnycevent">Tweet</a>					</li>
                    
							<!-- Google plus share -->
							<li>
								<div class="g-plusone" data-size="medium" rel="canonical"></div>
							</li>
							<li>
								<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

							</li>	
							</ul>
						</div>
					</div>
					</div>

					<!-- end of nested columns -->
				</div>
			</div>

		</section>

	@stop

	@section('scripts')

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> 
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@stop