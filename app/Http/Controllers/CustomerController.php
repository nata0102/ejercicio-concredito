<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\File;

class CustomerController extends Controller
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
      return view('capture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $customer = new customer;
      $customer->name = $request->name;
      $customer->last_name = $request->last_name;
      $customer->mother_last_name = $request->mother_last_name;
      $customer->street = $request->street;
      $customer->number = $request->number;
      $customer->suburb = $request->suburb;
      $customer->zip = $request->zip;
      $customer->phone = $request->phone;
      $customer->rfc = $request->rfc;
      $customer->status = 1;
      $store = $customer->save();
      $numDocument=0;
      $documentCount=0;
      $l = count($request->file);
      $numDocument = $l;
      for($i = 0; $i < $l; $i++){
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($a=0;$a < 10;$a++)
          $key .= $pattern{mt_rand(0,$max)};
        $key = $key.strtotime(date('Y-m-d H:i:s'));
        $document = $request->file('file');
        $documentName = $key. '.' . $document[$i]->getClientOriginalExtension();
        $document[$i]->move(
          public_path() . '/documents/', $documentName
        );
        $file = new File;
        $file->customer_id = $customer->id;
        $file->name = $documentName;
        $file->alias =  $request->file_alias[$i];
        $createDocument=$file->save();
        if ($createDocument) {
          $documentCount++;
        }
      }
      if($store){
        $notification = array(
          'message' => 'Datos almacenados con exito!',
          'alert-type' => 'success'
        );
      }else{
        $notification = array(
          'message' => 'Error al guardar!',
          'alert-type' => 'error'
        );
      }
      return redirect() -> action('MainController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $customer = Customer::find($id);
      return view('show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $customer = Customer::find($id);
      $customer->status = 3;
      $customer->observations = $request->observations;
      $store = $customer->save();
      if($store){
        $notification = array(
          'message' => 'Datos actualiuzados con exito!',
          'alert-type' => 'success'
        );
      }else{
        $notification = array(
          'message' => 'Error al guardar!',
          'alert-type' => 'error'
        );
      }
      return redirect() -> action('MainController@evaluation')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCustomer($id)
    {
      $customer = Customer::find($id);
      return view('evaluate',compact('customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function authorizeCustomer($id)
    {
      $customer = Customer::find($id);
      $customer->status = 2;
      $store = $customer->save();
      if($store){
        $notification = array(
          'message' => 'Datos actualiuzados con exito!',
          'alert-type' => 'success'
        );
      }else{
        $notification = array(
          'message' => 'Error al guardar!',
          'alert-type' => 'error'
        );
      }
      return redirect() -> action('MainController@evaluation')->with($notification);
    }
}
