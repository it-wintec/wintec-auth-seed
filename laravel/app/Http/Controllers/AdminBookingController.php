<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barberbooking;

class AdminBookingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Relationships
    // return Barberbooking::find(28)->service;

    $today = date("Y-m-d");
    $list = \DB::table('barberbooking')
      ->select('barberbooking.*','barberservice.name AS style')
      ->join('barberservice','barberservice.id','=','barberbooking.sid')
      ->where('sdate', '>=', $today)
      ->get();
    return \View::make("admin.booking")->with("list", json_encode($list));
  }

}
