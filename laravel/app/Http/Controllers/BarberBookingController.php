<?php

namespace App\Http\Controllers;

use App\Barberbooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class BarberBookingController extends Controller
{

  private $request;

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->request = $request;
    $result = $this->jsonError('Unknow Request');
    if (isset($request->all()["type"])) {
      switch ($request->all()["type"]) {
        case 'GETBOOKINGS':
          $result = $this->getBookings();
          break;
        case 'SAVEBOOKING':
          $result = $this->saveBooking();
          break;
      }
    }
    return $result;
  }

  // 获取所有预订
  private function getBookings()
  {
    $today = date("Y-m-d");
    $list = \DB::table('barberbooking')->where('sdate', '>=', $today)->get(['sdate','staff','stime']);
    return $this->jsonSeccess($list);
  }

  // 保存一个预订
  private function saveBooking()
  {
    $params = $this->request->all();
    $validate = \Validator::make($params, [
      'name' => 'required|string|min:3|max:20',
      'phone' => 'required|string|regex:/^[0-9\-\(\)]{9,20}$/',
      'email' => 'required|string|email|max:40',
      'sid' => 'required|integer',
      'sdate' => 'required|string|date',
      'stime' => 'required|integer',
      'staff' => 'required|integer',
    ]);

    if ($validate->fails()) {
      return $this->jsonError($validate->errors()->first());
    }

    // $date = \DateTime::createFromFormat('YYYY-MM-DD', $params['sdate']);

    $booking = new Barberbooking();
    $booking->uid = 0;
    $booking->name = $params['name'];
    $booking->phone = $params['phone'];
    $booking->email = $params['email'];
    $booking->sid = $params['sid'];
    $booking->sdate = $params['sdate'];
    $booking->stime = $params['stime'];
    $booking->staff = $params['staff'];
    $booking->status = 1;
    $booking->save();

    return $this->jsonSeccess("save success");
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
