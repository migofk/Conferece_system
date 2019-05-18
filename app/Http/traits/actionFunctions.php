<?php
namespace App\Http\Traits;
use DB;
use Carbon\Carbon;
trait actionFunctions {

/***************************************/
  public function deleteFile($filePath){
// $filePath ='photos/user-images/'.$user->image;
    if(is_file(public_path().'/'.$filePath)){
    if(file_exists(public_path().'/'.$filePath)){
    unlink($filePath);
    }
    }

   }
/***************************************/
public function saveFile($Thefile,$path){
//  $path ='photos/user-images';
//$Thefile = $request->file('featureImage')
  $imageName="";
  $image = $Thefile;
  $guessExtension = $Thefile->guessExtension();
  $imageName = 'imgfile'.time().'.'.$guessExtension;
  $image->move(public_path($path),$imageName);
   return $imageName;
 }

/***************************************/

public function saveDB_Data($Table,$data){
  //inseting data form
  $data['created_at'] =Carbon::now() ;
  $data['updated_at'] = Carbon::now();

  $TheID = DB::table($Table)->insertGetId($data);


  return $TheID;
 }

/***************************************/


}
