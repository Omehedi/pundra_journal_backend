@extends('frontend.layouts.master')
@section('content')
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                    <ul class="login-register-tab-list nav" role="tablist">
                        <li><a class="active" >Register</a></li>
                    </ul>
                    <div class="form">
                        @if (session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-warning">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="login-form" class="tab-pane active" >
                                <form action="{{url("login")}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row mbn-20">
                                        <div class="col-12 mb-20">
                                            <label for="register_email">Email Address<span class="required">*</span></label>
                                            <input type="text" id="register_email" name="email" value="{{request()->old('email')}}">
                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="register_password">Password<span class="required">*</span></label>
                                            <input type="password" id="register_password" name="password" value="{{request()->old('password')}}">
                                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input type="submit" class="btn btn-primary btn-block" value="Login">
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
