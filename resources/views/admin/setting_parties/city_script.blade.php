<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  var state_id= $(this).attr('state_id');
  var country_id= $(this).attr('country_id');
  $('#editName').val(editName);
  $('#itemID').val(itemID);
  $('#editstate_id').val(state_id);
  $('#editcountry_id').val(country_id);
  $('#modal-Edit').modal('show')

});
</script>

<script>


  var states = [];
  var cities = [];
  @foreach ($countries as $country)
states[{{$country->id}}] =[
     @foreach ($country->states as $value)
      { 'id':'{{$value->id}}','name':'{{$value->state}}'},
     @endforeach
  ];

   @foreach ($country->states as $state)
     cities[{{$state->id}}] =[
     @foreach ($state->cities as  $value)
     { 'id':'{{$value->id}}','name':'{{$value->city}}'},
     @endforeach
     ];
   @endforeach
   @endforeach

$('#country_id').change(function(){
  var country_id = $('#country_id').val();
  //$('#city_id')[0].options.length = 0;
  $('#state_id').find('option:not(:first)').remove();
  $('#state_id').find('option:not(:first)').remove();
  $.each(states[country_id], function (i, item) {
    $('#state_id').append($('<option>', {
        value: item.id,
        text : item.name
    }));
});

});

$('#editcountry_id').change(function(){
  var country_id = $('#editcountry_id').val();
  //$('#city_id')[0].options.length = 0;
  $('#editstate_id').find('option:not(:first)').remove();
  $('#editstate_id').find('option:not(:first)').remove();
  $.each(states[country_id], function (i, item) {
    $('#editstate_id').append($('<option>', {
        value: item.id,
        text : item.name
    }));
});

});

/*$('#state_id').change(function(){
  var state_id = $('#state_id').val();
  //$('#zone_id')[0].options.length = 0;
  $('#city_id').find('option:not(:first)').remove();
  $.each(zones[state_id], function (i, item) {
    $('#city_id').append($('<option>', {
        value: item.id,
        text : item.name
    }));
});

});*/
</script>
