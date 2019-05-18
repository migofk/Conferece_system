var categories =[];
$(document).ready(function() {
  //getting categories

  getcates();

});
/***********************************/
/*      getting categories         */
/***********************************/
//has a child
function hasChild(parent, array){
var childern = [];

$.each(array, function(key, value) {
if(parent.id == value.parent_id){
childern.push(value);
//alert(parent.id+'--------'+key.parent_id+'--'+childern[0].id);
}
});
if(childern.length >= 0){
return true;

}
else{
return false;

}

}//ENDhasChild

/******************************/
//build menu

function buildMenu(root,array,x){
var dash = x;

dash +='•  '  ;
categories.push(root);
//alert(hasChild(root,array));
//var man =hasChild(root,array);

if(hasChild(root,array)){


$.each(array, function(key, value) {

if(value.parent_id == root.id ){

value.name =dash+value.name;

buildMenu(value,array,dash);

}

});

}


}

/****************************************/

function getcates(){
  var table=[];
  var roots =[];
  var counter = "- ";

  $.get(appURL+"/adminWEB/allcategories", function(data){

   table = data ;
 //console.log(table);
   $.each(table, function(key, value) {
   if(value.parent_id == null){
   roots.push(value);
   //console.log(roots);
   }//if
 });//each


 $.each(roots, function(key, value) {
 buildMenu(value,table,"");
 });
//console.log(categories);
//check of element exists
if ($("#categories_data").length){
buildTheTable(categories,'#categories_data');
}
if ($("#category_parent_id").length){
buildTheSelection(categories,'#category_parent_id');
}
});//get

}//getcates
/******************************/
function buildTheTable (array,element){
  $(element).empty();
  if (array.length === 0) {
   $('#cateTable').hide();
   $('#alertWarning').removeClass('hidden');
   }
   var featureClass = 'primary';
  $.each(array, function(key, value) {
    if(value.featured == 1){
    featureClass ="warning";
    }
  $(element).append(
  '<tr>'
    +'<td>'+value.name+'</td>'
    +'<td><span class="label label-default">'+value.posts+'</span></td>'
    +'<td>'
    +'<a href="'+appURL+'/adminWEB/category/'+value.id+'/edit" class="btn btn-primary paddingLeft"><i class="fa fa-edit"> </i> </a> '
    +'<a class="btn btn-primary delete p2 paddingLeft" del-name="'+value.name+'" del-url="'+appURL+'/adminWEB/category/'+value.id+'"><i class="fa fa-trash"></i></a> '
    +'<a class="btn btn-'+featureClass+' feature" feat-value="'+value.featured+'" feat-name="'+value.name+'" feat-url="'+appURL+'/adminWEB/category/'+value.id+'/feature"><i class="fa fa-star"></i></a> '
    +'</td>'
    +'</tr>'

  );

  featureClass = "primary";
  });
  $("#tableLoading").remove();
}
/************************************************/
function buildTheSelection (array,element){
  var selected = "";
  $.each(array, function(key, value) {
    if(value.id == selectedParent){
    selected= 'selected';
    }
  if( value.id != cateID ){
  $(element).append(
'<option '+selected+' value="'+value.id+'">'+value.name+'</option>'

  );
  }
  selected = "";
  });

}
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
        location.reload();
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
var okay = confirm('Do you want to feature '+featName+'?');
if(okay){
   featurePost(featUrl,featValue,$(this));
}
});

function featurePost(url,featValue){
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
       if(data == 200){
         if(featValue == 1){
           featValue = 0
           $(this).removeClass('btn-warning').addClass('btn-primary');
         }else{
            featValue = 1
            $(this).removeClass('btn-primary ').addClass('btn-warning');

          }
       }
      }
      });

}
