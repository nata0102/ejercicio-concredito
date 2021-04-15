<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class MainController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function list()
  {
    $customers = Customer::all();
    return view('list',compact('customers'));
  }

  public function evaluation()
  {
    $customers = Customer::where('status','Enviado')->get();
    return view('evaluation',compact('customers'));
  }
}
