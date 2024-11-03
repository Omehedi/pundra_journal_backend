@extends('frontend.layouts.master')
@section('content')
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12 mx-auto">
                    <ul class="login-register-tab-list nav" role="tablist">
                        <li><a class="active">Register</a></li>
                    </ul>
                    <div class="form">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="register-form" class="tab-pane active">
                                <form action="{{url("registration")}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row mbn-20">
                                        <div class="col-12 mb-20">
                                            <label for="register_name">Name<span class="required">*</span></label>
                                            <input type="text" id="register_name" name="name" value="{{request()->old('name')}}">
                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="register_email">Email Address<span class="required">*</span></label>
                                            <input type="text" id="register_email" name="email" value="{{request()->old('email')}}">
                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="register_password">Phone<span class="required">*</span></label>
                                            <input type="number" id="number" name="phone" value="{{request()->old('phone')}}">
                                            <span class="text-danger">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mt-20">
                                            <label for="register_password">Password<span class="required">*</span></label>
                                            <input type="password" id="password" name="password" value="{{request()->old('password')}}">
                                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                        </div>
                                        <div class="col-6 mt-20">
                                            <label for="register_confirm_password">Confirm Password<span class="required">*</span></label>
                                            <input type="password" name="confirm_password" id="register_confirm_password" value="{{request()->old('confirm_password')}}">
                                            <span class="text-danger">{{$errors->has('confirm_password') ? $errors->first('confirm_password') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-20">
                                            <input type="submit" class="btn btn-primary btn-block" value="Register">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
