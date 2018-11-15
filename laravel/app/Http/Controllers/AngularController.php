<?php

namespace App\Http\Controllers;

use App\Androiduser;
use Illuminate\Http\Request;

class AngularController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $result = ["name" => "Jack By GET"];
    return $result;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $result = [
      "name" => "Comp710, This is a POST",
      "post" => $_POST
    ];
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    switch ($type) {
      case 'HERO_CREATE':
        $user = new Androiduser();
        $user->id = $_POST['id'];
        $user->name = $_POST['name'];
        $user->password = 'somethings';
        $user->save();
        $result = ['success'];
        break;
      case 'HERO_READ':
        $heros = \DB::table('androiduser')->select(['id', 'name'])->get();
        $result = ['heroes' => $heros];
        break;
      case 'HERO_UPDATE':
        $id = $_POST['id'];
        $user = Androiduser::find($id);
        $user->name = $_POST['name'];
        $user->save();
        $result = ['success'];
        break;
      case 'HERO_DELETE':
        $id = $_POST['id'];
        $user = Androiduser::find($id);
        $user->delete();
        $result = ['success'];
        break;
      default:
        break;
    }

    return $result;
  }

  /* ----------------------------------------------------
                      我是华丽的分割线
  ---------------------------------------------------- */

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $result = ["name" => "comp710, this is a create"];


    return $result;
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $result = ["name" => "comp710, this is a show"];


    return $result;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $result = ["name" => "comp710, this is a edit"];


    return $result;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $result = ["name" => "comp710, this is a update"];


    return $result;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $result = ["name" => "comp710, this is a destroy"];


    return $result;
  }
}
