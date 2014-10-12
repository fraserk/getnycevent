			@if ($errors->any())
       
            {!! implode('', $errors->all('<div data-alert class="alert-box warning">:message</div>')) !!}
        
    		@endif