					<div class="row">
						<div class="small-4 columns">
					{!!Form::label('name','Name:',['class'=>'right inline'])!!}
						</div>
						<div class="small-6 columns pull-2">
					{!!Form::text('name',null,['id'=>'right-label'])!!}
						</div>
					</div>

					<div class="row">
						<div class="small-4 columns">
					{!!Form::label('category','Category:',['class'=>'right inline'])!!}
						</div>
						<div class="small-6 columns pull-2">
					{!!Form::select('category_id',$categories, isset($event) ? $event->category_id : null,['id'=>'right-label'])!!}
						</div>
					</div>

					<div class="row">
						<div class="small-4 columns">
					{!!Form::label('venue_id','Event venue:',['class'=>'right inline'])!!}
						</div>
						<div class="small-3 columns">
							{!! Form::select('venue_id',$venues, isset($event) ? $event->venue_id : null)!!} 
							<div id="message"></div>
						</div>
						<div class="small-5 columns">
					<a href="#" data-reveal-id="addVenue">Add A New Venue</a>
						</div>
					</div>

					<div class="row">
						<div class="small-4 columns ">
					{!!Form::label('when','Date of Event:',['class'=>'right inline'])!!}
						</div>

						<div class="small-4 columns">
							Starts {!!Form::text('when',null,['placeholder'=>'Starts'])!!}
						</div>

						<div class="small-4 columns">
							Ends {!!Form::text('end',null,['placeholder'=>'Ends','id'=>'end'])!!}
						</div>

					</div>

					<div class="row">
						<div class="small-4 columns">
						{!!Form::label('cover','Cover:',['class'=>'right inline'])!!}
						</div>
						<div class="small-4 columns pull-4">
							{!!Form::text('cover',null,['placeholder'=>'Cover charge?','id'=>'right-label'])!!}
						</div>
						
					</div>
					<div class="row">
						<div class="small-4 columns">
						{!!Form::label('info','Info/URL to Website:',['class'=>'right inline'])!!}
						</div>
						<div class="small-4 columns pull-4">
							{!!Form::text('info',null,['placeholder'=>'URL to TIX/More Info','id'=>'right-label'])!!}
						</div>
						
					</div>

					<div class="row">
						<div class="small-4 columns">
					{!!Form::label('detail','Detail:',['class'=>'right inline'])!!}
						</div>
						<div class="small-6 columns pull-2">
					{!!Form::textarea('detail',null,['id'=>'right-label'])!!}
						</div>
					</div>

					<div class="row">
						<div class="small-4 columns">
							{!!Form::label('Flyer','Upload Flyer/Poster:',['class'=>'right inline'])!!}
						</div>
						<div class="small-8 columns">
							{!!Form::file('flyer',null,['id'=>'right-label'])!!}
						</div>

					</div>
					<div class="small-4 columns push-4">
					{!!Form::submit('Submit' ,['class'=>'button small radius'])!!}
					</div>