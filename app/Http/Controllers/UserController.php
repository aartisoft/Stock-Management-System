<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin_settings(){
        $data['title'] = "Edit Admin Settings";
        $data['admin']= User::where(['status'=>'Active'])->first();
        //$data['settings']['shop_name']= Setting::where(['type'=>'shop_name'])->first();
        return view('admin.adminSetting.admin_settings',$data);
    }

    public function update_admin_settings(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name'=>'required',
            'contactNo'=>'required',
            'email'=>'required',
            'status'=>'required',
            'image' => 'mimes:jpeg'


        ]);
        $user = User::where('status','Active')->first();
        $user->name= $request->name;
        $user->contactNo= $request->contactNo;
        $user->address= $request->address;
        $user->email= $request->email;
        if(isset($request->password))
        {
            $user->password= bcrypt($request->password);
        }
        $user->status= $request->status;
        $user->save();

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->getClientOriginalExtension()=='jpg'){
                //dd($user->id . '.' . $image->getClientOriginalExtension());

                $image->move('user_image/', $user->id . '.' . $image->getClientOriginalExtension());
            }

        }


        session()->flash('success','Admin Updated Successfully');
        return redirect()->back();
    }

    public function show_admin_settings(){
        $data['user'] = User::where('status','Active')->first();
        $data['title'] = $data['user']->name." "."Profile";
        return view('admin.adminSetting.show',$data);
    }

}
