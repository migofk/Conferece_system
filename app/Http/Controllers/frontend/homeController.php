<?php

namespace App\Http\Controllers\frontend;
use App\Http\Traits\actionFunctions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use App\country;
use auth;
class homeController extends Controller
{
  use actionFunctions;

  public function index()
  {
      $sliders = slider::all();

      return view('welcome',compact('sliders'));;
  }
  /***************************************************/
  public function packagePage($name)
  {

      $pagename = $name;
      return view($pagename);
  }
  /***************************************************/
  public function inquire_now()
  {

      $countries = country::all();
      return view('inquire_now',compact('sliders','countries'));
  }
  /****************************************************/

 public function store(Request $request)
 {
     $request->validate([
         'name' => 'required|max:255',
         'phone' => 'required|max:255',
         'email' => 'required|max:255',

     ]);

   $data = $request->except('_token','name_arr','phone_arr','email_arr','name','phone','email','country_id','invitations','status');
   $data_firstAttandent=([
    'name' => $request->name,
    'phone' => $request->phone,
    'email' => $request->email,
    'status' => 2,
    'country_id' => $request->country_id,
   ]);




 // $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
 // $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');


     //storing parent first attendant and package.
     $data['data']= 2;
     $data['added_by']= auth::user()->id;
     $data['attendant_id'] = $TheID =  $this->saveDB_Data('attendants',$data_firstAttandent);
     //storing package reference is attendant_id
     $this->saveDB_Data('subattendants',$data);
    //creating ticket for parent attendant
  $data_ticket =([
     'status' => 2,
     'attendant_id' => $TheID,
  ]);
  $this->saveDB_Data('tickets',$data_ticket);

     //storing other attendants
  /*   $x= 0;
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
     }*/


   return redirect(url('inquire_now/?success=1'));
 }
}
