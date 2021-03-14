<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Session;
use DB;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if(Session::get('login')){
            return redirect('/home');
        }

        if($request->isMethod('post')){
            $data= DB::select("
                select * from users where name = '$request->name' limit 1
            ");

            dd($data);

            if($data && $data[0]->password == md5($request->password)){
                Session::put('username', $data[0]->name);
                Session::put('login', TRUE);

                // if (Session::get('previousUrl')) {
                //     if ($redirect = Session::get('previousUrl')) {
                //         Session::forget('previousUrl');

                //         return Redirect::to($redirect);
                //     }
                // }
                return redirect('/home');
            }
            return redirect('/')->with(['error' => 'Username / Password Salah']);
        }
        return view('aut.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // public function postlogin(Request $request)
    // {
    //     if (Session::get('/')) {
    //         return redirect('/dashboard');
    //     }

    //     if ($request->isMethod('post')) {
    //         $data = DB::select("select * from user   where nama = '$request->nama' limit 1");
    //     }
    //     if ($data && $data[0]->password == ($request->password)) {
    //         Session::put('name', $data[0]->nama);
    //         Session::put('login', TRUE);

    //         if (Session::get('previousUrl')) {
    //             if ($redirect = Session::get('previousUrl')) {
    //                 Session::forget('previousUrl');

    //                 return Redirect::to($redirect);
    //             }
    //         }
    //         //toastr()->success('Authentikasi Berhasil');
    //         return redirect('/dashboard');
    //     }
    //     // toastr()->danger('Username atau Password Salah');
    //     return redirect('/')->with(['error' => 'Username atau Password Salah']);
    // }
}
