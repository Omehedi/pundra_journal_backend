@extends('frontend.layouts.master')
@section('content')
    <div class="section section-padding">
        <div class="container">
            <div class="row mbn-30">

                <div class="col-xl-3 col-lg-4 col-12 mb-30">
                    @include('frontend.layouts.profile_menu')
                </div>

                <div class="col-xl-9 col-lg-8 col-12 mb-30">
                    <div class="tab-content">
                        <div id="dashboard" class="tab-pane" role="tabpanel">
                            <div class="account-dashboard h6 fw-400">
                                <p>Hello <strong>Adam</strong> (not <strong>Adam</strong>? <a href="login-register.html">Log out</a>)</p>
                                <p>From your account dashboard you can view your <strong>recent orders</strong>, manage your <strong>shipping and billing addresses</strong>, and <strong>edit your password and account details</strong>.</p>
                            </div>

                        </div>

                        <div id="orders" class="tab-pane" role="tabpanel">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="order">Order</th>
                                        <th class="date">Date</th>
                                        <th class="status">Status</th>
                                        <th class="total">Total</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td><a href="#">#2581</a></td>
                                        <td>January 24, 2019</td>
                                        <td>Pending</td>
                                        <td>$157.00 for 2 items</td>
                                        <td><a href="#" class="fw-700">VIEW</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">#3482</a></td>
                                        <td>January 11, 2019</td>
                                        <td>On Hold</td>
                                        <td>$216.00 for 2 items</td>
                                        <td><a href="#" class="fw-700">VIEW</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">#1846</a></td>
                                        <td>January 06, 2019</td>
                                        <td>Approved</td>
                                        <td>$36.00 for 1 items</td>
                                        <td><a href="#" class="fw-700">VIEW</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div id="downloads" class="tab-pane" role="tabpanel">

                            <div class="table-responsive">
                                <table class="my-account-table table">
                                    <thead>
                                    <tr>
                                        <th class="order">Order</th>
                                        <th class="date">Date</th>
                                        <th class="expire">Expire</th>
                                        <th class="download">Download</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td><a href="#">#2581</a></td>
                                        <td>January 24, 2019</td>
                                        <td>15 Days</td>
                                        <td><a href="#" class="fw-700">DOWNLOAD</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">#3482</a></td>
                                        <td>January 11, 2019</td>
                                        <td>36 Days</td>
                                        <td><a href="#" class="fw-700">DOWNLOAD</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">#1846</a></td>
                                        <td>January 06, 2019</td>
                                        <td>Never</td>
                                        <td><a href="#" class="fw-700">DOWNLOAD</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div id="addresses" class="tab-pane" role="tabpanel">

                            <div class="account-address">
                                <div class="row mbn-30">
                                    <div class="col-sm-6 col-12 mb-30">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Aslam Hasib</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: <a href="#">(123) 456-7890</a><br>
                                                Email: <a href="#">bestcareerbd@gmail.com</a></p>
                                        </address>
                                        <a class="btn btn-light" href="#">Edit..</a>
                                    </div>
                                    <div class="col-sm-6 col-12 mb-30">
                                        <h3>Shipping Address</h3>
                                        <address>
                                            <p><strong>Aslam Hasib</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: <a href="#">(123) 456-7890</a><br>
                                                Email: <a href="#">bestcareerbd@gmail.com</a></p>
                                        </address>
                                        <a class="btn btn-light" href="#">Edit..</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div id="account-details" class="tab-pane active show" role="tabpanel">

                            <div class="form">
                                <form action="#">
                                    <div class="row mbn-20">

                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="account_first_name">First Name</label>
                                            <input type="text" id="account_first_name" value="Aslam">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="account_last_name">Last Name</label>
                                            <input type="text" id="account_last_name" value="Hasib">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="account_display_name">Display Name</label>
                                            <input type="text" id="account_display_name" value="Hasib">
                                            <span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="account_email">Email Address</label>
                                            <input type="email" id="account_email" value="bestcareerbd@gmail.com">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <h4 class="mb-15">Password change</h4>

                                            <div class="row mbn-20">

                                                <div class="col-md-4 col-12 mb-20">
                                                    <label for="current_password">Current password</label>
                                                    <input type="password" id="current_password">
                                                </div>

                                                <div class="col-md-4 col-12 mb-20">
                                                    <label for="new_password">New password</label>
                                                    <input type="password" id="new_password">
                                                </div>

                                                <div class="col-md-4 col-12 mb-20">
                                                    <label for="confirm_password">Confirm new password</label>
                                                    <input type="password" id="confirm_password">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input type="submit" class="btn btn-primary" value="save changes">
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
