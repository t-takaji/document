<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  //
  public function index()
  {
    $users = User::all();
    return view('index')->with('users', $users);
  }

  public function getschema()
  {
    $search = config('mock.search');

    if ($search[0]['errorCode'] == 0) {
      // OK
    } else {
      // NG
      return view('index');
      // return redirect()->action('UsersController@index');
    }

    $getschema = config('mock.getschema');

    if ($getschema[0]['errorCode'] == 0) {
      // OK
      return view('search')->with(['users' => $getschema, 'message' => 'get data!']);
    } else {
      // NG
      echo "error";
    }
  }
}
