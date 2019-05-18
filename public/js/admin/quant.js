
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
    //  data: {'_method' : "Delete"},
      type: 'post',
      headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
      success: function(data){
       //location.reload();
      }
      });

}
/*******************************************/
/*            feature category             */
/*******************************************/
$('body').on('click','.feature',function(){

var featUrl = $(this).attr('feat-url');
console.log(featUrl);
var featName = $(this).attr('feat-name');
var featValue = $(this).attr('feat-value');
if(featValue == 1){
  featValue = 0
  $(this).removeClass('btn-warning').addClass('btn-primary');
}else{
   featValue = 1
   $(this).removeClass('btn-primary ').addClass('btn-warning');

 }
console.log(featValue);


   featurePost(featUrl,featValue,$(this));

});

function featurePost(url,featValue,element){
  $.ajax({
      url: url,
      //dataType: 'script',
      cache: false,
      /*contentType: false,
      processData: false,*/
      data: {'feature' : featValue},
      type: 'post',
      headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
      success: function(data){


     $(element).removeClass('btn-warning').addClass('btn-primary');
     $('#messagDecoration').html('').text(data.decoration);
     $('#messagOrder').html('').text(data.theorder);
     $('#messagRe-order').html('').text(data.reorder);
     $('#messagContract').html('').text(data.contract_date);
     $('#messagDelivery').html('').text(data.delivery_date);


     $('#messagName').html('').text(data.name);
     $('#messagAddress').html('').text(data.address);
     $('#messagCountry').html('').text(data.country);
     $('#messagCity').html('').text(data.city);
     $('#messagPostcode').html('').text(data.postcode);
     $('#messagPhone').html('').text(data.phone);
     $('#messagEmail').html('').text(data.email);
     $('#messagMessage').html('').text(data.message);

      }
      });

}
