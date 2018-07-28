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
    $data = $users = DB::table('users')->get();

    echo "<pre>";
    var_dump($data);
    
    return 'Hello index finished.';
  }


  function show($name)
  {
    return view('hello', array('name1' => $name));
  }
  
  function insert() 
  {
    DB::table('users')->insert(
      ['email' => 'yyddrr@gmail.com', 'name' => "Jack Yang", 'password' => '123456']
    );
  }

}
