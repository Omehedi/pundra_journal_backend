<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        Auth::guard('user_web')->logout();

        return redirect('login');
    }

    public function profile(){
        return view('frontend.auth.profile');
    }

    public function userProfile(Request $request){
        return returnData(2000, auth()->guard('user_web')->user());
    }
    public function userProfileUpdate(Request $request)
    {
        $id = auth('user_web')->user()->id;
        $input = $request->all();

        $user = UserWeb::where('id', auth('user_web')->user()->id)->first();

        $validatorRules = [
            'name' => 'required',
            'email' => "required|email|unique:user_web,email,$id",
            'phone' => "required|numeric|unique:user_web,phone,$id"
        ];

        if (isset($input['password']) && !empty($input['password'])) {
            $validatorRules['password'] = 'required|string|min:6|same:confirm_password';
            $validatorRules['current_password'] =  ['required', function ($attr, $password, $validation) use ($user) {
                if (!Hash::check($password, $user->password)) {
                    return $validation(__('The current password is incorrect.'));
                }
            }];
        }

        $validator = Validator::make($input, $validatorRules);

        if ($validator->fails()) {
            return returnData(3000, $validator->errors(), 'Validation Error');
        }

        $user = UserWeb::where('id', auth('user_web')->user()->id)->first();
        $user->fill($input);

        if (isset($input['password']) && !empty($input['password'])) {
            $user->password = Hash::make($input['password']);
        }

        $user->save();

        return returnData(2000, $user, 'Successfully Updated');
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
