<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    //for t1
    public function f1()
    {
        $data['a']="hi ";
        return view('f1',$data);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_admin){
                return redirect()->intended('dashboard')->withSuccess('hi admin Signed in');
            }else{
                return redirect()->intended('/')->withSuccess('Signed in');

            }
        }


        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $data['level'] = 1;
        $data['is_admin'] = 1;
        $data['able'] = 1;
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'level' => 0,
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){

            $data['user']=User::find(Auth::user()->id);
            return view('dashboard',$data);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    //登出
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users'.date("Ymd").'.xlsx');
    }
}
