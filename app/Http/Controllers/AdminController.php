<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ebook = Ebook::all();
        return view('hello', compact('ebook'));
    }

    public function accm(){
        $role = Role::all();
        $gender = Gender::all();
        $acc = User::join('role', 'role.id', '=', 'account.role_id')
              		->join('gender', 'gender.id', '=', 'account.gender_id')
              		->get();
        return view('maintenance', compact('acc','gender','role'));
    }

    public function profile(){
        $role = Role::all();
        $gender = Gender::all();
        $akun = User::join('role', 'role.id', '=', 'account.role_id')
              		->join('gender', 'gender.id', '=', 'account.gender_id')
                    ->where('account_id',Auth::user()->account_id)
              		->first();
        return view('profile', compact('akun','gender','role'));
    }

    public function update(Request $request){
        $request->validate([
                'firstname'         =>      'alpha_num|max:25',
                'middlename'        =>      'alpha_num|max:25',
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

        if(!$input['password'] == ''){
        $pass = Hash::make($request->password);
        $input['password'] = $pass;
        }else{
            unset($input['password']);
        }

        $ini = User::where('account_id', $request->id_akun)->update($input);
        if($ini){
        return redirect()->route('profile')->with('success','Berhasil Update Profile');
        }else{
        return redirect()->route('profile')->with('failed','Gagal update profile');
        }
        dd($ini);

    }
}
