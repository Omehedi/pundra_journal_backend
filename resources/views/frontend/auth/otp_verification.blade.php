@extends('frontend.layouts.master')
@section('content')
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                    <div class="form">
                        @if (session()->has('otp_message'))
                            <div class="alert alert-warning">
                                {{ session()->get('otp_message') }}
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="login-form" class="tab-pane active" >
                                <form action="{{url("auth/otp_verification?next_url=$next_url")}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>OTP verification</h6>
                                            <input type="text" id="otp" name="otp" value="{{request()->old('otp')}}">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <h6>Don't Receive any code,  <a class="text-primary" href="{{url("auth/reset_otp?next_url=$next_url")}}">Resent</a> Code</h6>
                                        </div>
                                    </div>
                                    <div class="row mt-10">
                                        <div class="col-12 mb-20">
                                            <input type="submit" class="btn btn-success btn-block" value="Verify">
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
