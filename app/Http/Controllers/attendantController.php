<?php

namespace App\Http\Controllers;
use App\Http\Traits\actionFunctions;
use App\attendant;
use App\company;
use App\User;
use App\category;
use App\country;
use App\state;
use App\city;
use Illuminate\Http\Request;
use DB;
use  Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use auth;
class attendantController extends Controller
{

  use actionFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $menuActive = array('menu'=>'c2','submenu' =>'c2-l1');
      $name=__('general.Attendants');
      $rows =  attendant::where('status',1)->get();
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





        return view("admin.attendant",  compact('companies','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
    }


    public function index_company($companyID)
    {
        $company = company::find($companyID);
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l3');
      $name=__('general.attendants').' '. $company->company;

      $rows =  attendant::where('status',1)->where('company_id',$companyID)->get();
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





        return view("admin.attendant",  compact('company','companies','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|unique:attendants|max:255',

        ]);

      $data = $request->except('_token','name_arr','phone_arr','email_arr','name','phone','email','country_id','invitations','status');
      $data_firstAttandent=([
       'name' => $request->name,
       'phone' => $request->phone,
       'email' => $request->email,
       'status' => $request->status,
       'country_id' => $request->country_id,
      ]);




     $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
     $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');


        //storing parent first attendant and package.
        $data['added_by']= auth::user()->id;
        $data['attendant_id'] = $TheID =  $this->saveDB_Data('attendants',$data_firstAttandent);
        //storing package reference is attendant_id
        $this->saveDB_Data('subattendants',$data);
       //creating ticket for parent attendant
     $data_ticket =([
        'status' => $request->status,
        'attendant_id' => $TheID,
     ]);
     $this->saveDB_Data('tickets',$data_ticket);

        //storing other attendants
        $x= 0;
        foreach($request->name_arr as $nameX){
            if( $nameX != null){
            $data_otherAttendant=([
                'name' => $nameX,
                'phone' => $request->phone_arr[$x],
                'email' => $request->email_arr[$x],
                'status' => $request->status,
                'parent_id'=>$TheID,
                'country_id' => $request->country_id,
               ]);
               $TheID_sub = $this->saveDB_Data('attendants',$data_otherAttendant);
               $data_ticket_sub =([
                'status' => $request->status,
                'parent_attendant' => $TheID,
                'attendant_id' => $TheID_sub,
               ]);
               $this->saveDB_Data('tickets',$data_ticket_sub);
            }
            $x++;
        }


      return redirect(url('adminLink/attendants/'.$TheID.'/edit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function show(attendant $attendant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function edit(attendant $attendant)
    {
       // return $attendant->
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l1');
      $name= "Edit Attendants";
      $attendants=  attendant::where('parent_id',$attendant->id)->get()->sortBy('name');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





      return view("admin.attendant_action",  compact('attendants','attendant','status','name','menuActive','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendant $attendant)
    {
      return 'wlw';
      $data = $request->except('_token','_method','featureImage');
      $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
      $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');

      $data['updated_at']=Carbon::now();

      //storing image

      if(Input::hasFile('featureImage')){
        $this->deleteFile('photos/attendant-images/'.$attendant->photo);
        $data['photo'] =  $this->saveFile($request->file('featureImage'),'photos/attendant-images');
      }

      DB::table('attendants')->where('id', $attendant->id)->update($data);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendant $attendant)
    {
      $this->deleteFile('photos/attendant-images/'.$attendant->photo);
      attendant::destroy($attendant->id);
      return redirect('adminLink/viewattendant/'.$attendant->company_id.'?success=1');
    }
}
