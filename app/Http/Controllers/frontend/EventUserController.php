<?php

namespace App\Http\Controllers\frontend;

use App\event_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class eventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function createEvent($companyID)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=__('general.events');
      $company = company::find($companyID);
      $rows =  event::where('status',1)->where('company_id',$companyID)->get();

      $categories =  category::where('status',1)->get()->sortBy('category');

      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("frontend.event_create",  compact('company','status','rows','name','menuActive','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event_user  $event_user
     * @return \Illuminate\Http\Response
     */
    public function show(event_user $event_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event_user  $event_user
     * @return \Illuminate\Http\Response
     */
    public function edit(event_user $event_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event_user  $event_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event_user $event_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event_user  $event_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(event_user $event_user)
    {
        //
    }
}
