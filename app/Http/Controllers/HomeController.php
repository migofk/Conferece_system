<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\about;
use App\slider;
use App\contact;
class HomeController extends Controller
{
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

  


    public function admin_dashboard(){
      $menuActive = array('menu'=>'l1','submenu' =>'0');
      $name=__('general.Dashboard');
      return view('admin.dashboard',compact('menuActive','name'));
    }

    public function aboutUs(){
      $data = about::where('lang_id',2)->first();
      return view('frontend.about',compact('data'));
    }

    public function contactUs(){
      $data = contact::first();
      return view('frontend.contact',compact('data'));
    }

}
