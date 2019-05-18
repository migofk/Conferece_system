<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use App\activity;
use Image;
use Storage;
use Auth;
use File;
use Validator;
use App\Classes\thumMaker;
class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l14');
      $name='عرض الصور';
      $sliders = slider::where('lang_id',1)->orderby('created_at','desc')->get();
      return view('admin.sliders',compact('menuActive','name','sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l14');
      $name='عرض الصور';
      return view('admin.sliders_add',compact('menuActive','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Validator::make($request->all(), [
        'name' => 'required|max:500',
        'featureImage' => 'required',
        ])->validate();

        $slider = slider::create([
          'name' => $request->name,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>1,
          'featured' =>1,

        ]);


        //adding created_at manauly
        if($request->timeStamp !=""){
          $slider->update([
            'created_at'=>$request->timeStamp,

          ]);

        }
       /****************/

       $dir= 'photos/slider-images/'.$slider->id;
       if( is_dir($dir) === false )
        {
      File::makeDirectory($dir,0777);

        }

        $thumb1 = new thumMaker();
        $imgpath = 'photos/slider-images';

       //feature

        $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$slider->id,'slide');


       /*******************************************/

       // inserting images path.

       $slider->update([
         'featureImage'=>$imgpath1,
       ]);

       $success = 'Saved Successfully';

       $menuActive = array('menu'=>'c1','submenu' =>'c1-l14');
       $name='عرض الصور';

       return view('admin.sliders_add',compact('menuActive ','name','success'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $slider = slider::find($id);
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l14');
      $name='عرض الصور';
      return view('admin.sliders_edit',compact('menuActive','name','slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Validator::make($request->all(), [
        'name' => 'required|max:500',
      //  'featureImage' => 'required',
        ])->validate();

         $slider = slider::find($id);
         $slider->update([
          'name' => $request->name,
          'user_id' => $request->user_id,
        ]);


        //adding created_at manauly
        if($request->timeStamp !=""){
          $slider->update([
            'created_at'=>$request->timeStamp,

          ]);

        }
       /****************/
       if($request->hasFile('featureImage')){
       $dir= 'photos/slider-images/'.$slider->id;
       if( is_dir($dir) === false )
        {
      File::makeDirectory($dir,0777);

        }

        $thumb1 = new thumMaker();
        $imgpath = 'photos/slider-images';

       //feature

        $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$slider->id,'slide');


       /*******************************************/
       if($slider->featureImage !=''){
        $file_path = public_path().'/'.$slider->featureImage;
        if(file_exists($file_path)){
        unlink($file_path);
        }
        }
       // inserting images path.

       $slider->update([
         'featureImage'=>$imgpath1,
       ]);
     }
     $slider = slider::find($id);



       $success = 'Updated Successfully';
       $menuActive = array('menu'=>'c1','submenu' =>'c1-l14');
       $name='عرض الصور';
       return view('admin.sliders_edit',compact('menuActive','name','success','slider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $slider = slider::find($id);
      if($slider->featureImage !=''){
      $file_path = public_path().'/'.$slider->featureImage;
      if(file_exists($file_path)){
      unlink($file_path);
      }
      }

      slider::destroy($id);
    }
}
