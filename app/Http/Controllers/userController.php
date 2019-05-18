<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Traits\actionFunctions;
use App\User ;

use App\models\company;

use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Validator;
use Storage;
use Auth;
use File;
use  Illuminate\Support\Facades\Input;

class userController extends Controller
{
  use actionFunctions;
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

    public function index()
    {


      $rows =  User::all();
      $menuActive = array('menu'=>'c1','submenu' =>'c1-l1');
      $name= 'Users';
      $table = 'users';

      $managers =  DB::table('users')->where('status', 1)->get()->sortBy('name');

      $roles= Role::all()->sortBy('name');
      $permissions= Permission::all()->sortBy('name');


        return view('admin.user',
        compact('rows','menuActive','name','table',

         'roles','permissions'));

    }
/***********************************/

public function searchNumber(Request $request)
{

if($request->searchData != null){
  $data = User::where('phone',$request->searchData)

  ->orWhere('email',$request->searchData)

  ->first();

  if(!empty($data) && $request->id != $data->id){
  $data->assignedName = $data->name;
  return $data;
  }
  }
  return '200';

}


/**************************************/
public function searchuser(Request $request)
{


  $user = user::where('mobile',$request->searchData)
  ->orWhere('phone',$request->searchData)
  ->orWhere('company',$request->searchData)
  ->orWhere('name',$request->searchData)
  ->orWhere('email',$request->searchData)
  ->where('status',1)->first();



  if(!empty($user)){

  return redirect('user/'.$user->id);
  }else{
  return redirect('search?nocst=1');
  }
}
/***********************************/

   public function store(Request $request)
   {

     Validator::make($request->all(), [
       'name' => 'required|max:255',
       'phone' => 'string|unique:users,phone',
       'email' => 'email|unique:users,email',
       'role'=>'required',
       'status'=>'required',
       'password' => 'required|string|min:6|confirmed',
       ])->validate();
       $role = role::where('name',$request->role)->first();
       $user = User::create([

        'name' =>   $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'role_id' => $role->id,
        'status' => $request->status,
        'password' => Hash::make($request->password),

       ]);
       $user->assignRole($role->name);
       /****************/
       if($request->hasFile('featureImage')){
            //storing image
       $imageName =  $this->saveFile($request->file('featureImage'),'photos/user-images');

       $user->update([
         'image'=>$imageName,

       ]);
     }
       /*************************/
return redirect('user/'.$user->id);

   }

   /***********************************/

      public function edit(Request $request, $id)
      {




        if ($request->password !="") {


          Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|unique:users,phone,'.$id,
            'email' => 'required|unique:users,email,'.$id,

            'role'=>'required',
            'status'=>'required',
            'password' => 'required|string|min:6|confirmed',
            ])->validate();


          }else{


            Validator::make($request->all(), [
              'name' => 'required|max:255',
              'phone' => 'required|unique:users,phone,'.$id,
               'email' => 'required|unique:users,email,'.$id,

              'role'=>'required',
              'status'=>'required',

              ])->validate();


          }


          $user = User::find($id);
          $role = role::where('name',$request->role)->first();
          $userRole = $user->getRoleNames()->first();
        if ($userRole != $request->role) {
          if($userRole != null){
            $user->removeRole($userRole);}
           $user->assignRole($request->role);
           }


          $user->update([
            'name' =>   $request->name,
            'phone' => $request->phone,
            'email' => $request->email,

            'role_id' => $role->id,

            'status' => $request->status,


          ]);

          if ($request->password !="") {
            $user->update([
          'password' => Hash::make($request->password),
            ]);
          }




          /****************/
        if($request->hasFile('featureImage')){
        $this->deleteFile('photos/user-images/'.$user->image);
            //storing image
       $imageName =  $this->saveFile($request->file('featureImage'),'photos/user-images');
       $user->update(['image'=>$imageName]);


        }
          /*************************/
   return redirect('user/'.$id);

      }
/*************************************/
public function profile($id)
{

  $user = User::find($id);
  $menuActive = array('menu'=>'c1','submenu'=>'c1-l1');
  $name= 'users';
  $table = 'users';

  $roles= Role::all()->sortBy('name');
  $permissions= Permission::all()->sortBy('name');
  return view('admin.user_profile',compact('user','menuActive','name','table',
  'id','Users' ,'roles','permissions'));
}


/*************************************/






/*************************************/
//roles and permissions
/*************************************/

public function setupRoles (){
/*$roles = array('Admin','IT','Manager','Sales','Technichal Support' );
foreach ($roles as $name) {
  $role = Role::create(['name' => $name]);
}*/
/*$permissions = array(
  'customers view all', 'customers view mine', 'customers edit all', 'customers edit mine', 'customers delete all', 'customers delete mine',
  'notes view all', 'notes view mine', 'notes edit all', 'notes edit mine', 'notes delete all', 'notes delete mine',
  'activities view all', 'activities view mine', 'activities edit all', 'activities edit mine', 'activities delete all', 'activities delete mine',
  'services view all', 'services view mine', 'services edit all', 'services edit mine', 'services delete all', 'services delete mine',
  'tasks view all', 'tasks view mine', 'tasks edit all', 'tasks edit mine', 'tasks delete all', 'tasks delete mine',
  'settings view', 'settings edit', 'settings delete',
  'Reports view all', 'Reports view mine',
  'users view', 'users edit', 'users delete',
  'search view all',
);*/
/*foreach ($permissions as $name) {
  $permission = Permission::create(['name' => $name]);
}*/
// permissions for roles
// admin, IT = all permissions;
//manger permissions
/*$permissions = array(
  'customers view all', 'customers view mine', 'customers edit all', 'customers edit mine', 'customers delete all', 'customers delete mine',
  'notes view all', 'notes view mine', 'notes edit all', 'notes edit mine', 'notes delete all', 'notes delete mine',
  'activities view all', 'activities view mine', 'activities edit all', 'activities edit mine', 'activities delete all', 'activities delete mine',
  'services view all', 'services view mine', 'services edit all', 'services edit mine', 'services delete all', 'services delete mine',
  'tasks view all', 'tasks view mine', 'tasks edit all', 'tasks edit mine', 'tasks delete all', 'tasks delete mine',
  'Reports view all', 'Reports view mine',
  'search view all',
);*/
// sale, technical
/*$permissions = array(
   'customers view mine', 'customers edit all', 'customers edit mine',
  'notes view all', 'notes view mine',  'notes edit mine',  'notes delete mine',
  'activities view all', 'activities view mine', 'activities edit all', 'activities edit mine',
   'services view mine', 'services edit all', 'services edit mine',
   'tasks view mine',  'tasks edit mine', 'tasks delete mine',
  'Reports view mine',
  'search view all',
);*/

//$role = Role::find(5)->givePermissionTo($permissions);

//return 'done '.$role->name;
}
/**********************************************/
public function getRole ($id){


  $role= Role::find($id);
  return $role->getAllPermissions();
}
/**********************************************/
public function permissionRole (Request $request){
  //$permissions= Permission::all();
  $role = Role::find($request->role_id);
  $role->revokePermissionTo($role->getAllPermissions());
  $role->givePermissionTo($request->permissions);
//$role= Role::find($request->role_id);
return redirect('get/roles?success=1');
}
/**********************************************/
public function deleteRole (Request $request){
$role = Role::find($request->role_id);
$role->revokePermissionTo($role->getAllPermissions());
 Role::destroy($request->role_id);
return redirect('get/roles?success=1');
}
/**********************************************/
public function editRole (Request $request){
  $roles= Role::find($request->role_id)->update(['name' => $request->name]);
  return redirect('get/roles?success=1');
}
/**********************************************/
public function createRole (Request $request){
  $role = Role::create(['name' => $request->name]);
  return redirect('get/roles?success=1');
}

/**********************************************/
public function permissionUser (Request $request){
    $user = User::find($request->user_id);
    $user->revokePermissionTo($user->getDirectPermissions());

    $user->givePermissionTo($request->permissions);

    // Direct permissions
//$user->getDirectPermissions() // Or $user->permissions;

// Permissions inherited from the user's roles
//$user->getPermissionsViaRoles();

// All permissions which apply on the user (inherited and direct)
//$user->getAllPermissions();
return redirect('user/'.$user->id.'?success=1');
}

public function destroy(User $user){

$this->deleteFile('photos/user-images/'.$user->image);
if($user->companies != null){
$this->deleteFile('photos/company-logos/'.$user->companies->logo);

if($user->companies->events  != null){
foreach ($user->companies->events as $event) {
  $this->deleteFile('photos/event-images/'.$event->photo);
}
}
if($user->companies->products  != null){
foreach ($user->companies->products as $product) {
  $this->deleteFile('photos/product-images/'.$product->photo);
  User::destroy($product->id);
}
}

}
  User::destroy($user->id);
  return redirect('adminLink/users?success=1');
}



}
