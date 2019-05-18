<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\intro;
use App\activity;
use Image;
use Storage;
use Auth;
use File;
use Validator;
use App\Classes\thumMaker;
class introController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $intro =intro::find(1);
      $intro1=intro::where('lang_parent',$intro->id)->first();
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l13');
      $name=__('general.Edit Intro');
      return view('admin.intro_edit',compact('intro','intro1','menuActive','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.intro_add');
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
        //'name' => 'required|max:500',
        'summary' => 'required|max:500',
        'description' => 'required|max:65000',
        //'name1' => 'required|max:500',
        'summary1' => 'required|max:500',
        'description1' => 'required|max:65000',
        'featureImage' => 'required',
        ])->validate();

        if($request->featured ==""){
         $request->featured =0;
        }

        //saving English data in the table.
        $intro = intro::create([
          'name' => $request->name,
          'summary' => $request->summary,
          'description' => $request->description,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>1,
          'featured' =>$request->featured,

        ]);

         //saving Arabic data in the table.
        $intro1 = intro::create([
          'name' => $request->name1,
          'summary' => $request->summary1,
          'description' => $request->description1,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>2,
          'lang_parent' =>$intro->id,
          'featured' =>$request->featured,

        ]);
         //adding created_at manauly
         if($request->timeStamp !=""){
           $intro->update([
             'created_at'=>$request->timeStamp,

           ]);
           $intro1->update([
             'created_at'=>$request->timeStamp,

           ]);
         }
        /****************/

        $dir= 'photos/intro-images/'.$intro->id;
        if( is_dir($dir) === false )
         {
       File::makeDirectory($dir,0777);

         }

        /*******************************************/
        //feature image


         $thumb1 = new thumMaker();
         $imgpath = 'photos/intro-images';

        //feature

         $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$intro->id,'slide');

         //making thumbnail1   450


         $imgpath2 = $thumb1->aspect4Width($request->featureImage,450,236,$imgpath,$intro->id,'thumbnail1');


        //making thumbnail2  h 100

         $imgpath3 = $thumb1->aspect4Height($request->featureImage,191,100,$imgpath,$intro->id,'thumbnail2');


        /******************/

         // inserting images path.

         $intro->update([
           'featureImage'=>$imgpath1,
           'featureThumbnail1'=>$imgpath2,
           'featureThumbnail2'=>$imgpath3,
         ]);
         $intro1->update([
           'featureImage'=>$imgpath1,
           'featureThumbnail1'=>$imgpath2,
           'featureThumbnail2'=>$imgpath3,
         ]);
         /*************************/

        $success = 'Saved Successfully';
        $menuActive = array('menu'=>'c1','submenu' =>'c1-l13');
        $name=__('general.Edit Intro');
        return view('admin.intro_add',compact('success','menuActive','name'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $intro =intro::find($id);
      $intro1=intro::where('lang_parent',$intro->id)->first();
      return view('admin.intro_edit',compact('intro','intro1'));
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
        //'name' => 'required|max:500',

        'description' => 'required|max:65000',
        //'name1' => 'required|max:500',

        'description1' => 'required|max:65000',
        ])->validate();


        $intro = intro::find($id);
        $intro1 = intro::where('lang_parent',$id)->first();
        $intro1 = intro::find($intro1->id);

        if($request->featured ==""){
         $request->featured =0;
        }

        //updating English data in the table.
        $intro->update([
          'name' => $request->name,
          'summary' => $request->summary,
          'description' => $request->description,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>1,
          'featured' =>$request->featured,

        ]);

        //updating Arabic data in the table.
       $intro1->update([
         'name' => $request->name1,
         'summary' => $request->summary1,
         'description' => $request->description1,
         'user_id' => $request->user_id,
         'sort' =>0,
         'lang_id' =>2,
         'lang_parent' =>$intro->id,
         'featured' =>$request->featured,

       ]);
       //updating created_at manauly
       if($request->timeStamp !=""){
         $intro->update([
           'created_at'=>$request->timeStamp,

         ]);
         $intro1->update([
           'created_at'=>$request->timeStamp,

         ]);
       }
       /****************/
      if($request->hasFile('featureImage')){
       $dir= 'public/photos/intro-images/'.$intro->id;
       if( is_dir($dir) === false )
        {
      File::makeDirectory($dir,0777);

        }

       /*******************************************/

       //feature image


        $thumb1 = new thumMaker();
        $imgpath = 'photos/intro-images';

       //feature

        $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$intro->id,'new_');

        //making thumbnail1   450


        $imgpath2 = $thumb1->aspect4Width($request->featureImage,450,236,$imgpath,$intro->id,'thumbnail1_');


       //making thumbnail2  h 100

        $imgpath3 = $thumb1->aspect4Height($request->featureImage,191,100,$imgpath,$intro->id,'thumbnail2_');


       /******************/

        // inserting images path for deleting old images.
        $file_path[0] = public_path().'/'.$intro->featureImage;
        $file_path[1] = public_path().'/'.$intro->featureThumbnail1;
        $file_path[2] = public_path().'/'.$intro->featureThumbnail2;

        foreach($file_path as $filePath){
           if(file_exists($filePath)){
           unlink($filePath);
           }
        }

        $intro->update([
          'featureImage'=>$imgpath1,
          'featureThumbnail1'=>$imgpath2,
          'featureThumbnail2'=>$imgpath3,
        ]);
        $intro1->update([
          'featureImage'=>$imgpath1,
          'featureThumbnail1'=>$imgpath2,
          'featureThumbnail2'=>$imgpath3,
        ]);
        /*************************/





     }

     $success = 'Updated Successfully';
     $intro = intro::find($id);
     $intro1 = intro::where('lang_parent',$id)->first();
     $menuActive = array('menu'=>'c1','submenu' =>'c1-l13');
     $name=__('general.Edit Intro');



     return view('admin.intro_edit',compact('intro','intro1','success','menuActive','name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $intro =  intro::find($id);
      $intro1 = intro::where('lang_parent',$id)->first();
      $this->firstDelete($id);
      $this->firstDelete($intro1->id);


     return 200;
    }

    public function firstDelete($id){
      $theCate = intro::find($id);
      $file_path[0] = public_path().'/'.$theCate->featureImage;
      $file_path[1] = public_path().'/'.$theCate->featureThumbnail1;
      $file_path[2] = public_path().'/'.$theCate->featureThumbnail2;

      foreach($file_path as $filePath){
         if(file_exists($filePath)){
        unlink($filePath);
         }
      }
      intro::destroy($id);
    }

    public function featuredOnHome(Request $request,$id)
    {
      $intro = intro::find($id);
      $intro2 = intro::where('lang_parent',$id)->first();
      $intro->update(['featured' => $request->feature]);
      $intro2->update(['featured' => $request->feature]);



        return 200;

    }
}
