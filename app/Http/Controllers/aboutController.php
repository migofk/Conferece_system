<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\about;
use App\activity;
use Image;
use Storage;
use Auth;
use File;
use Validator;
use App\Classes\thumMaker;
class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $about = about::where('lang_id',1)->first();
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l11');
      $name=__('general.about');
      return view('admin.about',compact('about','menuActive','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_add');
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
        $about = about::create([
          'name' => $request->name,
          'summary' => $request->summary,
          'description' => $request->description,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>1,
          'featured' =>$request->featured,

        ]);

         //saving Arabic data in the table.
        $about1 = about::create([
          'name' => $request->name1,
          'summary' => $request->summary1,
          'description' => $request->description1,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>2,
          'lang_parent' =>$about->id,
          'featured' =>$request->featured,

        ]);
         //adding created_at manauly
         if($request->timeStamp !=""){
           $about->update([
             'created_at'=>$request->timeStamp,

           ]);
           $about1->update([
             'created_at'=>$request->timeStamp,

           ]);
         }
        /****************/

        $dir= 'public/photos/about-images/'.$about->id;
        if( is_dir($dir) === false )
         {
       File::makeDirectory($dir,0777);

         }

        /*******************************************/
        //feature image


         $thumb1 = new thumMaker();
         $imgpath = 'photos/about-images';

        //feature

         $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$about->id,'slide');

         //making thumbnail1   450


         $imgpath2 = $thumb1->aspect4Width($request->featureImage,450,236,$imgpath,$about->id,'thumbnail1');


        //making thumbnail2  h 100

         $imgpath3 = $thumb1->aspect4Height($request->featureImage,191,100,$imgpath,$about->id,'thumbnail2');


        /******************/

         // inserting images path.

         $about->update([
           'featureImage'=>$imgpath1,
           'featureThumbnail1'=>$imgpath2,
           'featureThumbnail2'=>$imgpath3,
         ]);
         $about1->update([
           'featureImage'=>$imgpath1,
           'featureThumbnail1'=>$imgpath2,
           'featureThumbnail2'=>$imgpath3,
         ]);
         /*************************/

        $success = 'Saved Successfully';
        $menuActive = array('menu'=>'c1','submenu' =>'c1-l11');
        $name=__('general.Edit About');
        return view('admin.about_add',compact('success','menuActive','name'));


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
      $about =about::find($id);
      $about1=about::where('lang_parent',$about->id)->first();
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l11');
      $name=__('general.Edit About');
      return view('admin.about_edit',compact('about','about1','menuActive','name'));
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
        'summary' => 'required|max:500',
        'description' => 'required|max:65000',
        //'name1' => 'required|max:500',
        'summary1' => 'required|max:500',
        'description1' => 'required|max:65000',
        ])->validate();


        $about = about::find($id);
        $about1 = about::where('lang_parent',$id)->first();
        $about1 = about::find($about1->id);

        if($request->featured ==""){
         $request->featured =0;
        }

        //updating English data in the table.
        $about->update([
          'name' => $request->name,
          'summary' => $request->summary,
          'description' => $request->description,
          'user_id' => $request->user_id,
          'sort' =>0,
          'lang_id' =>1,
          'featured' =>$request->featured,

        ]);

        //updating Arabic data in the table.
       $about1->update([
         'name' => $request->name1,
         'summary' => $request->summary1,
         'description' => $request->description1,
         'user_id' => $request->user_id,
         'sort' =>0,
         'lang_id' =>2,
         'lang_parent' =>$about->id,
         'featured' =>$request->featured,

       ]);
       //updating created_at manauly
       if($request->timeStamp !=""){
         $about->update([
           'created_at'=>$request->timeStamp,

         ]);
         $about1->update([
           'created_at'=>$request->timeStamp,

         ]);
       }
       /****************/
      if($request->hasFile('featureImage')){
       $dir= 'photos/about-images/'.$about->id;
       if( is_dir($dir) === false )
        {
      File::makeDirectory($dir,0777);

        }

       /*******************************************/

       //feature image


        $thumb1 = new thumMaker();
        $imgpath = 'photos/about-images';

       //feature

        $imgpath1 = $thumb1->saveImage($request->featureImage,$imgpath,$about->id,'new_');

        //making thumbnail1   450


        $imgpath2 = $thumb1->aspect4Width($request->featureImage,450,236,$imgpath,$about->id,'thumbnail1_');


       //making thumbnail2  h 100

        $imgpath3 = $thumb1->aspect4Height($request->featureImage,191,100,$imgpath,$about->id,'thumbnail2_');


       /******************/

        // inserting images path for deleting old images.
        $file_path[0] = public_path().'/'.$about->featureImage;
        $file_path[1] = public_path().'/'.$about->featureThumbnail1;
        $file_path[2] = public_path().'/'.$about->featureThumbnail2;

        foreach($file_path as $filePath){
           if(file_exists($filePath)){
           unlink($filePath);
           }
        }

        $about->update([
          'featureImage'=>$imgpath1,
          'featureThumbnail1'=>$imgpath2,
          'featureThumbnail2'=>$imgpath3,
        ]);
        $about1->update([
          'featureImage'=>$imgpath1,
          'featureThumbnail1'=>$imgpath2,
          'featureThumbnail2'=>$imgpath3,
        ]);
        /*************************/





     }

     $success = 'Updated Successfully';
     $about = about::find($id);
     $about1 = about::where('lang_parent',$id)->first();
     $menuActive = array('menu'=>'c1','submenu' =>'c1-l11');
     $name=__('general.Edit About');



     return view('admin.about_edit',compact('about','about1','success','menuActive','name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $about =  about::find($id);
      $about1 = about::where('lang_parent',$id)->first();
      $this->firstDelete($id);
      $this->firstDelete($about1->id);


     return 200;
    }

    public function firstDelete($id){
      $theCate = about::find($id);
      $file_path[0] = public_path().'/'.$theCate->featureImage;
      $file_path[1] = public_path().'/'.$theCate->featureThumbnail1;
      $file_path[2] = public_path().'/'.$theCate->featureThumbnail2;

      foreach($file_path as $filePath){
         if(file_exists($filePath)){
        unlink($filePath);
         }
      }
      about::destroy($id);
    }

    public function featuredOnHome(Request $request,$id)
    {
      $about = about::find($id);
      $about2 = about::where('lang_parent',$id)->first();
      $about->update(['featured' => $request->feature]);
      $about2->update(['featured' => $request->feature]);



        return 200;

    }
}
