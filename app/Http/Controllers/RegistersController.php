<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class RegistersController extends Controller
{
    public function index(){
        $role = Role::all();
        $gender = Gender::all();
        return view('register', compact('role','gender'));
    }

    public function create(Request $request){
        $request->validate(
            [
                'firstname'         =>      'required|alpha_num|max:25',
                'middlename'        =>      'alpha_num|max:25',
                'lastname'          =>      'required|alpha_num|max:25',
                'gender'            =>      'required',
                'email'             =>      'required|email:rfc,dns|unique:account,email',
                'role'              =>      'required',
                'password'          =>      'required|alpha_num|min:6',
                'display_pict'      =>      'required|image|mimes:jpeg,png,jpg|max:5048',

            ]
        );
        $datenya = date('Y-m-d');
        $pass = Hash::make($request->password);
        $image = time().'.'.$request->display_pict->extension();
        $request->display_pict->move(public_path('uploads'), $image);

        $dataArray = array(
                'first_name'                =>      $request->firstname,
                'middle_name'               =>      $request->middlename,
                'last_name'                 =>      $request->lastname,
                'gender_id'                 =>      $request->gender,
                'email'                     =>      $request->email,
                'role_id'                   =>      $request->role,
                'password'                  =>      $pass,
                'display_picture_link'      =>      $image,
                'delete_flag'               =>      0,
                'modified_at'               =>      $datenya,
                'modified_by'               =>      'user',
        );

        $user           =       User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Registrasi Berhasil");
        }

        else {
            return back()->with("failed", "Alert! Failed to register");
        }

    }

    public function update(Request $request){
        $request->validate([
                'firstname'         =>      'alpha_num|max:25',
                'role_id'        =>      'required',
                'lastname'          =>      'alpha_num|max:25',
                'email'                     =>      'email:rfc,dns',
                'display_picture_link'      =>      'image|mimes:jpeg,png,jpg|max:5048',
        ]);

        $input = $request->except(['_token','_method','id_akun','display_picture_link']);
        $datenya = date('Y-m-d');

        if ($image = $request->file('display_picture_link')) {
            $image = time().'.'.$request->display_picture_link->extension();
            $request->display_picture_link->move(public_path('uploads'), $image);
            $input['display_picture_link'] = $image;
        }else{
            unset($input['display_picture_link']);
        }
        $ini = User::where('account_id', $request->id_akun)->update($input);
        if($ini){
        return redirect()->route('account_maintenance')->with('success','Berhasil Update Profile');
        }else{
        return redirect()->route('account_maintenance')->with('failed','Gagal update profile');
        }

    }

    public function delete(Request $request)
    {
        $id_usernya = $request->account_id;
        $res = User::where('account_id',$id_usernya)->delete();
        if($res) {
            return redirect()->route('account_maintenance')->with("success", "Berhasil Hapus User");
        } else {
            return redirect()->route('account_maintenance')->with("failed", "Gagal Hapus User");
        }
    }
}
