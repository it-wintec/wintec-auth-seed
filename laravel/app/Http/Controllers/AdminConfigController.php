<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConfigController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $list = null;
    return \View::make("admin.config")->with("list", $list);
  }
}
