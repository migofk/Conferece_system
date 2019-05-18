
/*******************************************/
/*            delete category              */
/*******************************************/
$('body').on('click','.delete',function(){

var DelUrl = $(this).attr('del-url');
console.log(DelUrl);
var DelName = $(this).attr('del-name');
var okay = confirm('Do you want to delete '+DelName+'?');
if(okay){
   deletePost(DelUrl);
   $(this).parents('tr').fadeOut('slow/400/fast');
}
});
function deletePost(url){
  $.ajax({
      url: url,
      //dataType: 'script',
      cache: false,
      /*contentType: false,
      processData: false,*/
      data: {'_method' : "Delete"},
      type: 'post',
      headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
      success: function(data){
       //location.reload();
      }
      });

}
