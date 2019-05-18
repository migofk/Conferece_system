<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  var country_id= $(this).attr('country_id');
  $('#editName').val(editName);
  $('#itemID').val(itemID);
  $('#editcountry_id').val(country_id);
  $('#modal-Edit').modal('show')

});
</script>
