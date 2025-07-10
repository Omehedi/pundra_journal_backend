@extends('frontend.layout.master')
@section('content')
    <!-- Main Content start -->
    <div class="container my-5">
        <div class="single-services-page area-padding py-5 ">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="section-headline text-left">
                            <h3 class="fw-bold text-uppercase" style="color: #1e2c52;;">Contact Us</h3>
                        </div>
                        <div class="last-update text-muted mb-2">
                            Last update: 01.01.2020
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 contact-us-content ">
                        <div class="p-3 bg-white rounded card shadow-sm">
                            <h5 class="fw-bold mb-3 text-secondary">
                                <i class="fas fa-map-marker-alt me-2"></i>Address of Correspondences
                            </h5>
                            <p class="mb-1">Editor-in-chief, TMSS Medical College Journal, TMSS Medical College</p>
                            <p class="mb-1 ">Rangpur Road, Thengamara, Bogura, Bangladesh.</p>
                            <p class="mb-1 ">Contact: 01775316617</p>
                            <p class="mb-1 ">Email: editortmcjournal@gmail.com</p>
                            <p class="mb-0 ">Web: www.tmcjounral.org</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded card shadow-sm">
                            <form id="contactForm" method="POST" action="http://rockstheme.com/rocks/tionscal-previews/contact.php">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" placeholder="Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="msg_subject" class="form-control" placeholder="Subject" required data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12">
                                        <textarea id="message" rows="5" class="form-control" placeholder="Message" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="article-details-down-top">
                                            <a href="#">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- main content end  -->
@endsection