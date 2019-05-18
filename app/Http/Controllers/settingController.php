<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;

class settingController extends Controller
{
//notes status =1 is active 0 = not


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPage($tableName)
    {

      if ($tableName ==="categories") {
             $rows =  DB::table('categories')->where('status', 1)->get();
             $menuActive = array('menu'=>'c1','submenu' =>'c1-l10');
             $name= __('general.Categories');
             $table = 'categories';
             $special = true;

      }

    if ($tableName ==="countries") {
           $rows =  DB::table('countries')->where('status', 1)->get();
           $menuActive = array('menu'=>'c1','submenu' =>'c1-l7');
           $name= __('general.Countries');
           $table = 'countries';
           $special = true;

    }

    if ($tableName ==="states") {
           $rows =  DB::table('states')->where('status', 1)->get();
           $menuActive = array('menu'=>'c1','submenu' =>'c1-l8');
           $name= __('general.States');
           $table = 'states';
           $special = true;
    }

    if ($tableName ==="cities") {
           $rows =  DB::table('cities')->where('status', 1)->get();
           $menuActive = array('menu'=>'c1','submenu' =>'c1-l9');
           $name= __('general.Cities');
           $table = 'cities';
           $special = true;
    }



    if ($tableName ==="roles") {
           $rows =  DB::table('roles')->get();
           $menuActive = array('menu'=>'c1','submenu' =>'c1-l15');
           $name= __('general.User Roles & Permissions');
           $table = 'roles';
           $special = true;
    }

        return view('admin.setting',compact('rows','menuActive','name','table','special'));
    }

/***********************************/
  public function createActivityInput(Request $request)
  {
    $data = $request->except('_token','table');

    //inseting data form
    $TheID = DB::table($request->table)->insertGetId($data);
    //update other data
    DB::table($request->table)->where('id', $TheID)->update([
      'created_at' => Carbon::now() , 'updated_at' => Carbon::now(),
      'status'=>1
    ]);

    return redirect('get/'.$request->table);
  }

  /***********************************/

  public function editActivityInput(Request $request)
  {
    $data = $request->except('_token','table','itemID');

    DB::table($request->table)->where('id', $request->itemID)->update($data);
    DB::table($request->table)->where('id', $request->itemID)->update(['updated_at' => Carbon::now() ]);


    return redirect('get/'.$request->table);
  }
  /***********************************/

  public function deleteActivityInput(Request $request)
  {

    DB::table($request->table)->where('id', $request->itemIDdel)->update([
      'status' => 0  ,  'updated_at' => Carbon::now()

    ]);
    return redirect('get/'.$request->table);
  }




}
