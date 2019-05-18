<script >

$('.editbutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  $('#editName').val(editName);
  $('#itemID').val(itemID);
  $('#modal-Edit').modal('show')

});


$('.permissionsbutton').click(function(){


  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  $('#editName').val(editName);
  $('#itemIDPermission').val(itemID);
  $('#permissionsbutton').modal('show')

    $.get(theUrl+"/getRole/"+itemID, function(data, status){
   console.log(data);
    /*   $(data).each(function(){
      //alert($(this).text())
      console.log($(this).name);
    });*/


$('.checkITems').each(function(){this.checked = false
  var xm = this;
    $.each(data, function (index, item) {
    if(xm.value == item.name ){
      xm.checked = true;


    }

    });
    });

});
});

$('.deleteRolebutton').click(function(){
  var editName= $(this).attr('item');
  var itemID= $(this).attr('itemId');
  $('#itemRolename').val(editName);
  $('#itemRoleIDdel').val(itemID);
  $('#modal-roledelete').modal('show')

});
</script>
