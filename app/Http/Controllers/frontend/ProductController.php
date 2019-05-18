<?php

namespace App\Http\Controllers\frontend;
use App\Http\Traits\actionFunctions;
use App\product;
use App\category;
use App\company;
use Illuminate\Http\Request;
use DB;
use  Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{

  use actionFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function index_company($companyID)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=__('general.Products');
      $company = company::find($companyID);
      $rows =  product::where('status',1)->where('company_id',$companyID)->get();

      $categories =  category::where('status',1)->get()->sortBy('category');

      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("frontend.product_create",  compact('company','status','rows','name','menuActive','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct($companyID)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=__('general.Products');
      $company = company::find($companyID);
      $rows =  product::where('status',1)->where('company_id',$companyID)->get();

      $categories =  category::where('status',1)->get()->sortBy('category');

      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





        return view("frontend.product_create",  compact('company','status','rows','name','menuActive','categories'));
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

      //storing image
      if(Input::hasFile('featureImage')){
        $data['photo'] =  $this->saveFile($request->file('featureImage'),'photos/product-images');
      }
        //storing data
      $TheID =  $this->saveDB_Data('products',$data);
      return redirect(url('products/'.$TheID.'/edit?success=1'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
      $menuActive = array('menu'=>'c2','submenu' =>'c2-l2');
      $name=$product->product;
      $company = $product->company;
      $categories=  category::where('status',1)->get()->sortBy('category');

      $status = (object)
     [(object)['id' => 0,  'status' => 'Deactive',],
      (object)['id' => 1,  'status' => 'Active', ],
      (object)['id' => 2,  'status' => 'Waiting Review',]];





      return view("frontend.product_edit",  compact('company','product','status','name','menuActive','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
      $data = $request->except('_token','_method','featureImage');
      $data['updated_at']=Carbon::now();

      //storing image

      if(Input::hasFile('featureImage')){

        $this->deleteFile('photos/product-images/'.$product->photo);
        $data['photo'] =  $this->saveFile($request->file('featureImage'),'photos/product-images');
      }

      DB::table('products')->where('id', $product->id)->update($data);
      return $data['photo'];
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
      $this->deleteFile('photos/product-images/'.$product->photo);
      product::destroy($product->id);
      return redirect('adminLink/viewproduct/'.$product->company_id.'?success=1');
    }
}
