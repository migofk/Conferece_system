<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  var parentID= $(this).attr('parentID');

  $('#editName').val(editName);
  $('#itemID').val(itemID);
  $('#editparent_id').val(parentID);
  $('#modal-Edit').modal('show')

});
</script>
