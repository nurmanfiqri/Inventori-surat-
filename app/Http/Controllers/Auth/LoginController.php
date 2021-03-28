<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Session::get('login')) {
            return redirect('/home');
        }

        if ($request->isMethod('post')) {
            $data = DB::select("
            select * from karyawan a join setting_role b on a.id = b.id_karyawan and b.is_delete = 0 join role c on c.id = b.id_role join divisi_h d on d.id = a.id_divisi join divisi_d e on e.id = a.id_jabatan where a.username = '$request->name'
            ");
            // dd($data[0]->password);
            if ($data && $data[0]->password == md5($request->password)) {
                Session::put('user_id', $data[0]->id);
                Session::put('id_karyawan', $data[0]->id_karyawan);
                Session::put('username', $data[0]->username);
                Session::put('id_role', $data[0]->id_role);
                Session::put('nama', $data[0]->nama_karyawan);
                Session::put('role', $data[0]->role);
                Session::put('id_divisi', $data[0]->id_divisi);
                Session::put('id_jabatan', $data[0]->id_jabatan);
                Session::put('divisi', $data[0]->nama_divisi);
                Session::put('jabatan', $data[0]->nama_jabatan);
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
        return view('aut.login')->with(['error' => 'Role karyawan belum di Setting']);
    }

    public function logout()
    {
        Session::flush();
        // toastr()->success('Logout Berhasil');
        return redirect('/');
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
