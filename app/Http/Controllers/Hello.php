<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Hello extends Controller
{
  function index()
  {
    // $data = DB::select("select 123;");
    // $data = $users = DB::table('users')->get();
    
    return 'Hello index finished.';
  }


  function show($name)
  {
    return view('hello', array('name1' => $name));
  }
  
  function insert() 
  {
    var_dump('123');
    // DB::table('users222')->insert(
    //   ['email' => 'yyddrr@gmail.com', 'name' => "Jack Yang", 'password' => '123456']
    // );
  }
  
  function phpinfo()
  {
    phpinfo();
    exit();
  }

}
