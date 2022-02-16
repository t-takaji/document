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

    public function mocksearch(Request $request){
        $config = config('mock');
        print_r($config[0]['id']);
        return view('/search')->with([
            'users' => $config,
            'message' => 'jsonから取得しました。',
        ]);
    }

    public function search(Request $request) {
        $keyword_name = $request->name;
        $keyword_age = $request->age;
        $keyword_sex = $request->sex;
        $keyword_age_condition = $request->age_condition;
  
        if(!empty($keyword_name) && empty($keyword_age) && empty($keyword_age_condition)) {
        $query = User::query();
        $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
        $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
        return view('/search')->with([
          'users' => $users,
          'message' => $message,
        ]);
      }
  
      elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 0){
            $message = "年齢の条件を選択してください";
            return view('/search')->with([
              'message' => $message,
            ]);
      }
      elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
        $query = User::query();
        $users = $query->where('age','>=', $keyword_age)->get();
        $message = $keyword_age. "歳以上の検索が完了しました";
        return view('/search')->with([
          'users' => $users,
          'message' => $message,
        ]);
      }
      elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
        $query = User::query();
        $users = $query->where('age','<=', $keyword_age)->get();
        $message = $keyword_age. "歳以下の検索が完了しました";
        return view('/search')->with([
          'users' => $users,
          'message' => $message,
        ]);
      }
      elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
        $query = User::query();
        $users = $query->where('name','like', '%' .$keyword_name. '%')->where('age','>=', $keyword_age)->get();
        $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以上の検索が完了しました";
        return view('/search')->with([
          'users' => $users,
          'message' => $message,
        ]);
      }
      elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
        $query = User::query();
        $users = $query->where('name','like', '%' .$keyword_name. '%')->where('age','<=', $keyword_age)->get();
        $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以下の検索が完了しました";
        return view('/search')->with([
          'users' => $users,
          'message' => $message,
        ]);
      }
      elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 1){
        $query = User::query();
        $users = $query->where('sex','男')->get();
        $message = "男性の検索が完了しました";
              return view('/search')->with([
                'users' => $users,
                'message' => $message,
              ]);
      }
      elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 2){
        $query = User::query();
        $users = $query->where('sex','女')->get();
        $message = "女性の検索が完了しました";
              return view('/search')->with([
                'users' => $users,
                'message' => $message,
              ]);
      }
      else {
        $message = "検索結果はありません。";
        return view('/search')->with('message',$message);
        }
  }
}
