<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // profileをすべて取得
        $profiles = Profile::all();
        // admin/profile/index.blade.phpにprofilesを渡す
        return view('admin.profile.index',['profiles'=>$profiles]);
    }

    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        // idでprofileデータを取得
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        // admin/profile/edit.blade.phpにprofileを渡す
        return view('admin.profile.edit',['profile'=>$profile]);
    
    }

    public function update()
    {
        // Validationをかける
        $this->validate($request,Profile::$rules);

        // News Modelからデータを取得する
        $profile = Profile::find($request->id);

        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        unset($form['_token']);

        //該当するデータを上書きして保存する
        $profile->fill($form)->save();
        return redirect('admin/profile/');
    }
}
