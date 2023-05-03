<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Auth;
use Hash; 

class AdminController extends Controller
{
    public function index()
    {
        // dd('11111111111');
        if(Auth::guard('admin')->check())
        {
          // dd("okj");
            return redirect()->route('admin.home');
        }

        return view('pages.login');
    }

    public function CheckLogin(Request $request)
    {
         $user = Auth::guard('admin')->attempt([
                'name' => request('name'),
                'password' => request('password')]);
         if($user)
        {
            // dd("ok");
            return redirect()->route('admin.home')->with('alert-success','are you successfully');
        }else{
            return redirect()->back()->with('alert-danger','plz valid login');
        }
    }


    public function home()
    {
        return view('pages.admin.home');
    }

    public function login()
    {
        // return view('pages.admin.home');
    }
     public function addform()
    {
        $citys = DB::table('cities')->get();
        $states = DB::table('states')->get();
        return view('pages.admin.addform',compact('citys','states'));
    }
       public function listing()
    {
        $listing = DB::table('users')->get();
        return view('pages.admin.listing',compact('listing'));
    }

     public function savedata(Request $res)
    {

        $user = new User;
        $user->name = $res->name;
        $user->password  = $res->password;
        $user->phone  = $res->phone;
        $user->save();
        return redirect()->back()->with('message','data save successfully');
    }
}

