<?php
namespace App\Classes;
use Image;
class thumMaker
{

public function saveImage($image,$imgpath,$post_id,$filname){

    $img = Image::make($image);
    $mime = $img->mime();
      if ($mime == 'image/jpeg')
      $extension = '.jpg';
     elseif ($mime == 'image/png')
      $extension = '.png';
     elseif ($mime == 'image/gif')
      $extension = '.gif';

     $imgpath2 = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;
     $imgpath = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;

      $img->save($imgpath2);


    return $imgpath;

}

public function aspect4Width($image,$width,$heigh,$imgpath,$post_id,$filname){

    $img = Image::make($image);
    $mime = $img->mime();
      if ($mime == 'image/jpeg')
      $extension = '.jpg';
     elseif ($mime == 'image/png')
      $extension = '.png';
     elseif ($mime == 'image/gif')
      $extension = '.gif';

     $imgpath2 = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;
     $imgpath = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;

	$img->resize($width, null, function ($constraint) {
      $constraint->aspectRatio();
      });
      if($img->height() < $heigh){
      $img->resize(null, $heigh);
       }
      else if($img->height() > $heigh){
      $img->crop($width, $heigh, 0, 0);
       }
      $img->save($imgpath2);


    return $imgpath;

}

public function aspect4Height($image,$width,$heigh,$imgpath,$post_id,$filname){

    $img = Image::make($image);

    $mime = $img->mime();

      if ($mime == 'image/jpeg')
      $extension = '.jpg';
     elseif ($mime == 'image/png')
      $extension = '.png';
     elseif ($mime == 'image/gif')
      $extension = '.gif';
     $imgpath2 = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;
     $imgpath = $imgpath.'/'.$post_id.'/'.$filname.time().$extension;

	$img->resize(null, $heigh, function ($constraint) {
      $constraint->aspectRatio();
      });
      if($img->width() < $width){
      $img->resize($width, null);
       }
      else if($img->width() > $width){
      $img->crop($width, $heigh, 0, 0);
       }
      $img->save($imgpath2);

       return $imgpath;
}

}





 ?>
