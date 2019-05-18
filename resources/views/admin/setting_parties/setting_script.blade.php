<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  $('#editName').val(editName);
  $('#itemID').val(itemID);
  $('#modal-Edit').modal('show')

});
</script>
