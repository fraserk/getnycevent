<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

            <title>GetNYCevents - @yield('title','Whats happening this weekend?')</title>
            <meta name = "description" content="@yield('description', 'Get NYC Events, get infomation about local events in New York.  Find out whats happen this weekend.')"> 
        <link href="http://fonts.googleapis.com/css?family=Josefin+Sans|Montserrat|Josefin+Sans|Medula+One|Open+Sans|Roboto"rel="stylesheet" type="text/css">
        {!!HTML::style('/assets/style/normalize.css')!!}
        {!!HTML::style('/assets/style/foundation.css')!!}
        {!!HTML::style('/assets/style/jquery.datetimepicker.css')!!}
        {!!HTML::style('/assets/foundation-icons/foundation-icons.css')!!}    

</head>

<body>
    <section class="">
        <div class="contain-to-grid">
        <nav class="top-bar" data-topbar role="navigation">
              <ul class="title-area">
                <li class="name">
                  <a href="/">{!!HTML::image('assets/images/getnycevent.png')!!}</a>
                </li>
                 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
              </ul>

              <section class="top-bar-section">

                <!-- Left Nav Section -->
                   <ul class="right">
                    <li>{!!HTML::link('/','Home')!!}</li>
                    
                    @if(Auth::Check())
                    <li>{!!link_to_route('dashboard','My Account',[])!!}
                    <li>{!!link_to_route('create.event','Post an Event')!!}
                    <li>{!!HTML::link('auth/logout','Logout')!!}</li>
                    
                    @else
                    <li>{!!HTML::link('auth/login','Login')!!}</li>
                    <li>{!!HTML::link('auth/register','Register')!!}</li>
                    @endif
                    <li>{!!link_to_route('contact','Contact us')!!}</li>
                </ul>
              </section>
            </nav>
         </div>
    
    </section>

    @if(Session::has('message'))
    <div class="row">
         <div class="small-12 columns">
            <div data-alert class="alert-box">
              <!-- Your content goes here -->
              {{Session::get('message')}}
               <a href="#" class="close">&times;</a>
          </div>
        </div>
    </div>

    @endif
    

    
    @yield('content')
    
    
    <section class="footer">
        <div class="row">
            <div class="larger-12 columns">
               <ul class="no-bullet">
                  <li><a href="http://twitter.com/getnycevent">  <i class="fi-social-twitter large"></i></a></li>
                  <li><a href="https://plus.google.com/108209078557449361832" rel="publisher">Visit us on Google+</a></li>
               </ul>
            </div>
        </div>

    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  {!!HTML::script('assets/js/vendor/modernizr.js')!!}
  {!!HTML::script('assets/js/foundation.min.js')!!}
  {!!HTML::script('assets/js/vendor/fastclick.js')!!}
  {!!HTML::script('assets/js/jquery.datetimepicker.js')!!}
  @yield('scripts')
     <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-128168-3', 'getnycevent.com');
  ga('send', 'pageview');

</script>

   <script>
     $(document).foundation();
  </script>
</body>
</html>
