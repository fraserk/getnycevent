
@extends('layouts.template')


    @section('content')

  
@include('partials.hero')
 
<section class="content eventListing">
        <div class="row upcomming">
          
            <div class="small-1 columns">
                <span class="label">Filter Event's</span> 
            </div>
            <div class="small-8 columns">
                <ul class="no-bullet inline-list">
                    <li><a href="{!!URL::to('/')!!}"> All</a></li>
                    @foreach($categories as $category)
                    <li>{!!link_to_route('show.category',$category->categoryName,[$category->slug])!!}</li>
                    @endforeach
                    
                </ul>
               
            </div>
            {!!Form::open(['method'=>'GET'])!!}                  
                        <div class="small-2 columns right radius">
                            {!!Form::input('search','q',null,['placeholder'=>'Search'])!!}
                        </div>
                      
                {!!Form::close()!!}

        </div>
         @if($evnts->isEmpty())

         <div class="row">
                <div class="small-12 columns">
                    <p>No Events in this category as yet.</p>
                </div>
            </div>
         @else
            <!-- start of the event display -->
            @foreach($evnts as $event)
         <div class="row border" itemscope itemtype="http://data-vocabulary.org/Event">   
                <div class="large-2 small-12 medium-2 columns text-center eventDate">
                 <ul class="no-bullet">
                    <li class="day"><time itemprop="startDate" datetime="{!!$event->when->toISO8601String() !!}}">{!!$event->when->format('d')!!}</time>
                        <time itemprop="endDate" datetime="{!!$event->end->toISO8601String() !!}}"></time>
                    </li>
                    <li class="month">{!!$event->when->format('M')!!}</li>
                </ul>

                </div>

                <div class="large-2 small-12 medium-2 columns poster ">
                    @if($event->flyer)     
                        <img itemprop="photo" src="{!!Cloudy::show($event->flyer, array('width' => 240, 'height' => 240, 'crop' => 'fill', 'radius' => 0))!!}"> 
                         @else
                         {!!HTML::image('assets/images/noimage.png')!!}
                        
                         
                         @endif
                        
                        
                </div>

                <div class="large-8 medium-8 columns eventcontent">
                    <div class="row eventheader">
                        <div class="small-12 columns">
                 <h5 class="subheader">{!! HTML::linkroute('show.event',$event->name,[$event->slug],['itemprop'=>'url'])!!} </h5> 
                            </div>
                        </div>
              
                    <p itemprop="description">{!! Str::words($event->detail,'42','...') !!}</p>
                    <div class="row">
                    <div class="small-12 columns address" itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                         <strong>@ <span itemprop="name">{!!$event->venue->venueName!!} </span>| <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address"> <span itemprop="street-address">{!!$event->venue->address!!} </span>| <span itemprop="locality">{!!$event->venue->city!!}</span> | <span itemprop="region">{!!$event->venue->state!!} </span> | {!!$event->venue->zip!!} </strong></span> | Category: <span itemprop="eventType">{!!$event->category->categoryName!!}</span>
                    </div>
                </div>
                </div>
               
        </div>

            
            <!-- End of the event display -->
            @endforeach

        
            <div class="row">
                <div class="small-12 columns">
                    {!! $evnts->links()!!}
                </div>
            </div>
        </div>
  @endif
     </div>
    
    </section>

       @stop