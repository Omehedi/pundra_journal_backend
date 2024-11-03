<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendAuthController extends Controller
{
    public function loginForm(){
        return view('frontend.auth.login');
    }
    public function registrationForm(){
        return view('frontend.auth.registration');
    }

    public function doRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user_web,email',
            'phone' => 'required|numeric|unique:user_web,phone',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        DB::beginTransaction();

        $user = new UserWeb();
        $user->fill($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        DB::commit();

        session()->flash('success', 'Registration Successful');
        return redirect("login");
    }

    public function doLogin(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginData = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => 1,
        ];

        if (Auth::guard('user_web')->attempt($loginData)){
            return redirect('auth/profile');
        }else{
            return redirect('login')->withErrors(['message' => 'Can not find users with provided credential']);
        }
    }

    public function logout(){

        Auth::logout();

        return redirect('login');
    }

    public function profile(){
        return view('frontend.auth.profile');
    }

    public function userProfile(Request $request){
        return returnData(2000, auth()->guard('user_web')->user());
    }

    public function configurations()
    {
        $data['Config'] = [];
        $data['user'] = UserWeb::where('id', auth()->guard('user_web')->id())->first();

        $data['menus'] = [
            [
                'link' => '/auth/informations?data=basic',
                'name' => 'Basic Informations',
            ]
        ];
        $data['layer'] = [];
        return returnData(2000, $data);
    }
}
