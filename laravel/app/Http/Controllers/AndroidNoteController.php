<?php

namespace App\Http\Controllers;

//use App\MagicCrypt;

use App\Androidnote;
use App\Androiduser;
use Illuminate\Http\Request;

class AndroidNoteController extends Controller
{

  private $data = array();

  /**
   * AndroidUserController constructor.
   * @param array $data
   */
  public function __construct()
  {
    $this->data = ["GET" => $_GET, "POST" => $_POST, "user" => "Jack"];
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return $this->jsonError('unknown request');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return json_encode($this->data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $result = $this->jsonError('unknown request');
    if (isset($_POST['type'])) {
      $type = $_POST['type'];
      switch ($type) {
        case 'REGISTER':
          $result = $this->register();
          break;
        case 'LOGIN':
          $result = $this->login();
          break;
        case 'SAVEANEWNOTE':
          $result = $this->saveNewNote();
          break;
        case 'GETONEUSERNOTES':
          $result = $this->getOneUserNotes();
          break;
        case 'GETONENOTE':
          $result = $this->getOneNote();
          break;
        case 'EDITANOTE':
          $result = $this->editOneNote();
          break;
        case 'DELETEANOTE':
          $result = $this->deleteOneNote();
          break;
      }
    }
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
    return json_encode($this->data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return json_encode($this->data);
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
    return json_encode($this->data);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return json_encode($this->data);
  }

  // 注册
  private function register()
  {
    if (!isset($_POST['name']) || empty($_POST['name'])) {
      return $this->jsonError('No name or password for register');
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
      return $this->jsonError('No name or password for register');
    }

    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $userExists = \DB::table('androiduser')->where('name', $name)->first();
    if ($userExists) {
      return $this->jsonError('User already exists');
    }

    $user = new Androiduser();
    $user->name = $name;
    $user->password = $password;
    $user->save();

    $id = \DB::getPdo()->lastInsertId();

    return $this->jsonSeccess($id);
  }


  // 登录
  private function login()
  {
    if (!isset($_POST['name']) || empty($_POST['name'])) {
      return $this->jsonError('No name or password for login');
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
      return $this->jsonError('No name or password for login');
    }

    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $userExists = \DB::table('androiduser')->where('name', $name)->first();
    if ($userExists) {
      if ($userExists->password == $password) {
        return $this->jsonSeccess((string)$userExists->id);
      }
    }
    return $this->jsonError('failed');
  }

  // 保存新的note
  private function saveNewNote()
  {
    if (!isset($_POST['title']) || empty($_POST['title'])) {
      return $this->jsonError('No title or content');
    }

    if (!isset($_POST['content']) || empty($_POST['content'])) {
      return $this->jsonError('No title or content');
    }

    if (!isset($_POST['uid']) || empty($_POST['uid'])) {
      return $this->jsonError('No User ID');
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $uid = trim($_POST['uid']);


    $note = new Androidnote();
    $note->uid = $uid;
    $note->title = $title;
    $note->content = $content;

    $note->save();

    return $this->jsonSeccess('Success');

  }

  // 获取某人的所有note
  private function getOneUserNotes()
  {
    if (!isset($_POST['uid']) || empty($_POST['uid'])) {
      return $this->jsonError('No User ID');
    }

    $notes = \DB::table('androidnote')->where('uid', $_POST['uid'])->get();

    return $this->jsonSeccess($notes);

  }

  // 获取一个note
  private function getOneNote()
  {
    if (!isset($_POST['noteid']) || empty($_POST['noteid'])) {
      return $this->jsonError('No Noteid');
    }

    $note = \DB::table('androidnote')->where('id', $_POST['noteid'])->first();
    return $this->jsonSeccess($note);
  }

  // 编辑一个note
  private function editOneNote()
  {
    if (!isset($_POST['noteid']) || empty($_POST['noteid'])) {
      return $this->jsonError('No note id');
    }

    if (!isset($_POST['title']) || empty($_POST['title'])) {
      return $this->jsonError('No title or content');
    }

    if (!isset($_POST['content']) || empty($_POST['content'])) {
      return $this->jsonError('No title or content');
    }

    if (!isset($_POST['uid']) || empty($_POST['uid'])) {
      return $this->jsonError('No User ID');
    }

    $noteid = trim($_POST['noteid']);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $uid = trim($_POST['uid']);

    $note = Androidnote::find($noteid);
    $note->title = $title;
    $note->content = $content;
    $note->save();

    return $this->jsonSeccess('Success');
  }

  private function deleteOneNote()
  {
    if (!isset($_POST['noteid']) || empty($_POST['noteid'])) {
      return $this->jsonError('No note id');
    }
    $noteid = trim($_POST['noteid']);
    $note = Androidnote::find($noteid);
    $note->delete();

    return $this->jsonSeccess('Success');

  }


  private function jsonSeccess($body)
  {
    $result = array();
    $result['code'] = 0;
    $result['body'] = $body;
    return json_encode($result);
  }

  private function jsonError($msg)
  {
    $result = array();
    $result['code'] = 999;
    $result['body'] = $msg;
    return json_encode($result);
  }

}
