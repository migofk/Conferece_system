<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\contact;
use App\activity;
use Validator;

use Storage;
use Auth;
use File;
use App\Classes\thumMaker;
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = contact::first();
        $menuActive = array('menu'=>'c1','submenu' =>'c1-l12');
        $name=__('general.Edit Contact Us');
        return view('admin.contact',compact('contact','menuActive','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.admin_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
      $contact = contact::find($id);
      $contact->update([
       'address_ar' => $request->address_ar,
       'address_en' => $request->address_en,
       'phone1' => $request->phone1,
       'phone2' => $request->phone2,
       'email' => $request->email,
       'facebook' => $request->facebook,
       'twitter' => $request->twitter,
       'google' => $request->google,
       'instagram' => $request->instagram,
       'linkedIn' => $request->linkedIn,

      ]);

      $contact->save;

      

      $contact = contact::find($id);
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l12');
      $name=__('general.Edit Contact Us');
      $success = 'Updated Successfully';
      return view('admin.contact',compact('success','contact','menuActive','name'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
