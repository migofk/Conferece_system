<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  var code= $(this).attr('code');
  var calling_code= $(this).attr('calling_code');
  var currency_id= $(this).attr('currency_id');
  $('#editname').val(editName);
  $('#itemID').val(itemID);
  $('#editcode').val(code);
  $('#editcalling_code').val(calling_code);
  $('#editcurrency_id').val(currency_id);
  $('#modal-Edit').modal('show')

});
</script>
