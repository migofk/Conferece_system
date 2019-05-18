<?php

namespace App\Http\Controllers\frontend;
use App\Http\Traits\actionFunctions;
use App\event;
use App\company;
use App\User;
use App\category;
use App\country;
use App\state;
use App\city;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use  Illuminate\Support\Facades\Input;
use Carbon\Carbon;
class eventController extends Controller
{

  use actionFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $menuActive = array('menu'=>'c2','submenu' =>'c2-l3');
      $name=__('general.Events');
      $rows =  event::where('status',1)->get();
      $Users=  User::where('status',1)->get()->sortBy('name');
      $companies=  company::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("admin.event",  compact('companies','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
    }


    public function index_company($companyID)
    {
        $company = company::find($companyID);
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l3');
      $name=__('general.Events').' '. $company->company;

      $rows =  event::where('status',1)->where('company_id',$companyID)->get();
      $Users=  User::where('status',1)->get()->sortBy('name');
      $companies=  company::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("admin.event",  compact('company','companies','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
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
      $name=__('general.Products');
      $company = company::find($companyID);
      $rows =  event::where('status',1)->where('company_id',$companyID)->get();
      $rows =  event::where('status',1)->where('company_id',$companyID)->get();
      $Users=  User::where('status',1)->get()->sortBy('name');
      $companies=  company::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');

      $categories =  category::where('status',1)->get()->sortBy('category');

      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("frontend.event_create",  compact('company','companies','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->except('_token','featureImage');

     $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
     $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');

      //storing image
      if(Input::hasFile('featureImage')){
        $data['photo'] =  $this->saveFile($request->file('featureImage'),'photos/event-images');
      }
        //storing data
      $TheID =  $this->saveDB_Data('events',$data);
      return redirect(url('events/'.$TheID.'/edit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l3');
      $name=$event->event;
      $company= $event->company;
      $companies=  company::where('status',1)->get()->sortBy('name');
      $Users=  User::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





      return view("frontend.event_edit",  compact('company','companies','event','status','name','menuActive','Users','countries','regions','cities','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
      $data = $request->except('_token','_method','featureImage');
      $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
      $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');

      $data['updated_at']=Carbon::now();

      //storing image

      if(Input::hasFile('featureImage')){
        $this->deleteFile('photos/event-images/'.$event->photo);
        $data['photo'] =  $this->saveFile($request->file('featureImage'),'photos/event-images');
      }

      DB::table('events')->where('id', $event->id)->update($data);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
      $this->deleteFile('photos/event-images/'.$event->photo);
      event::destroy($event->id);
      return redirect('adminLink/viewevent/'.$event->company_id.'?success=1');
    }
}
