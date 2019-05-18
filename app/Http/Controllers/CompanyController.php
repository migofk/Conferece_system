<?php

namespace App\Http\Controllers;
use App\Http\Traits\actionFunctions;
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
class CompanyController extends Controller
{

  use actionFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=__('general.Companies');
      $rows =  company::where('status',1)->get();
      $Users=  User::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
      [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];


        return view("admin.company",  compact('status','rows','name','menuActive','Users','countries','regions','cities','categories'));
    }


    public function reviewcompanies()
    {

      $menuActive = array('menu'=>'c2','submenu' =>'c2-l4');
      $name="فى انتظار المراجعة";
      $rows =  company::where('status',3)->get();
      $Users=  User::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
      [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];


        return view("admin.company",  compact('status','rows','name','menuActive','Users','countries','regions','cities','categories'));
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

    public function createCompany($id)
    {

      $User=  User::find($id);
      if($User->companies ==  null){
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=__('general.Companies') . ' - ' .$User->name;
      $rows =  company::where('status',1)->get();

      $Users=  User::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');

      $status = (object)
      [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];
      $types = (object)
      [
      (object)['id' => 1,  'type' => 'فردي', ],
      (object)['id' => 2,  'type' => 'مساهمة',]
      ];


      return view("admin.createcompany",  compact('types','User','status','rows','name','menuActive','Users','countries','regions','cities','categories'));
}
return "you can't";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->except('_token','featureImage','category_id');

      //storing image
      if(Input::hasFile('featureImage')){
        $data['logo'] =  $this->saveFile($request->file('featureImage'),'photos/company-logos');
      }
        //storing data
      $TheID =  $this->saveDB_Data('companies',$data);

      $company = company::find($TheID);
      $company->allcategories()->detach();
      $company->allcategories()->attach($request->category_id);

      return redirect(url('adminLink/companies/'.$TheID.'/edit?success=1'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=$company->company .' - ' .$company->user->name;

      $Users=  User::where('status',1)->get()->sortBy('name');
      $categories=  category::where('status',1)->get()->sortBy('category');
      $countries =  country::where('status',1)->get()->sortBy('country');
      $regions =  state::where('status',1)->get()->sortBy('state');
      $cities =  city::where('status',1)->get()->sortBy('city');
      $status = (object)
      [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];
      $types = (object)
      [
      (object)['id' => 1,  'type' => 'فردي', ],
      (object)['id' => 2,  'type' => 'مساهمة',]
      ];





      return view("admin.company_action",  compact('types','company','status','name','menuActive','Users','countries','regions','cities','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
      $data = $request->except('_token','_method','featureImage','category_id');
      $data['updated_at']=Carbon::now();

      $company->allcategories()->detach();
      $company->allcategories()->attach($request->category_id);

      //storing image

      if(Input::hasFile('featureImage')){
        $this->deleteFile('photos/company-logos/'.$company->logo);
        $data['logo'] =  $this->saveFile($request->file('featureImage'),'photos/company-logos');
      }

      DB::table('companies')->where('id', $company->id)->update($data);

      return redirect(url()->previous().'?success=1' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
