<script type="text/javascript">
 $(function() {
$(".add_venue").submit(function(){
          /* stop form from submitting normally */
      event.preventDefault();
               $.ajax({
                type: "POST",
                url: "{{url('event/addvenue')}}",

                data: $('form.add_venue').serialize(),
                success: function(msg){
                   //$(venue).append(theNewListItem);
                    
                    $('#addVenue').foundation('reveal', 'close');
                     //$("#myModal").modal('hide');  
                     //var response_obj = jQuery.parseJSON(r.responseText);
                    $('#venue_id').append('<option value="'+(msg.id)+ '"selected="selected">'+(msg.venueName)+'</option>');
                    $('#message').html (msg.venueName +' Added successfully....');

                 },
            error: function(msg){
               //alert("failure");
               $('#error').html ('Please fill at least the name field..');

                }
                  });
    });
});


</script>