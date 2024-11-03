@extends('frontend.layouts.master')
@section('meta')
        <meta property="og:title" content="{{ $data->title }}">
        <meta property="og:description" content="{!! strLimit($data->description,100) !!}">
        <meta property="og:image" content="{{ url("/image?w=800&img=$data->image") }}">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:title" content="{{ $data->title }}">
        <meta property="twitter:description" content="{!! strLimit($data->description,100) !!}">
        <meta property="twitter:image" content="{{ url("/image?w=800&img=$data->image") }}">

        <meta property="whatsapp:title" content="{{ $data->title }}">
        <meta property="whatsapp:description" content="{!! strLimit($data->description,100) !!}">
        <meta property="whatsapp:image" content="{{ url("/image?w=800&img=$data->image") }}">

        <meta property="linkedin:title" content="{{ $data->title }}">
        <meta property="linkedin:description" content="{!! strLimit($data->description,100) !!}">
        <meta property="linkedin:image" content="{{ url("/image?w=800&img=$data->image") }}">
        <meta property="linkedin:url" content="{{ url()->current() }}/{{ $data->slug }}">
@endsection

@section('content')
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget">
                            <div class="inner">
                                <div class="row m-n2">
                                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                        <ul class="job-overview list-unstyled">
                                            <h6 class="title">Apply Precedure</h6>
                                            <li>Must Send Resent  Photo</li>
                                            <li>Must Send Updated Resume in PDF Formate</li>
                                        </ul>

                                        <a href="{{ url("jobs/$data->slug/$data->id/apply") }}" class="d-block btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Job Overview</h6>
                                <ul class="job-overview list-unstyled">

                                    <li><strong>Published on:</strong> {{$data->created_at}}</li>
                                    <li><strong>Vacancy:</strong> {{$data->no_of_position}}</li>
                                    <li><strong>Employment Status:</strong> {{ $data->jobTypeName }}</li>
                                    <li><strong>Job Category :</strong> {{ $data->jobCategoryName }}</li>
                                    <li><strong>Experience:</strong> {{$data->experience_from}} - {{$data->experience_to}}</li>

                                    @if($data->minAge && $data->maxAge)
                                        <li><strong>Age:</strong> {{$data->minAge}} - {{$data->maxAge}}</li>
                                    @endif

                                    @if ($jobEducation)
                                        <?php
                                        $educationIds = json_decode($jobEducation->education_id, true);
                                        $educationIdArray = array_column($educationIds, 'education_id');

                                        $educationNames = DB::table('edu_qua')->whereIn('EDU_QUA_CODE', $educationIdArray)->pluck('EDU_QUA_DESC');
                                        ?>

                                        @if ($educationNames->isNotEmpty())
                                            <li><strong>Education Qualifications:</strong> {{ $educationNames->implode(', ') }}</li>
                                        @endif
                                    @endif

                                    @if ($jobSubject)
                                        <?php
                                        $subjectIds = json_decode($jobSubject->subject_id, true);
                                        $subjectIdArray = array_column($subjectIds, 'subject_id');

                                        $subjectNames = DB::table('edu_subject')
                                            ->whereIn('SUBJECT_CODE', $subjectIdArray)
                                            ->pluck('SUBJECT_NAME');
                                        ?>

                                        @if ($subjectNames->isNotEmpty())
                                            <li><strong>Allowed Subjects:</strong> {{ $subjectNames->implode(', ') }}</li>
                                        @endif
                                    @endif

                                    @if ($jobCriteria)
                                        <?php
                                        $districtIds = json_decode($jobCriteria->district_id, true);
                                        $districtIdArray = array_column($districtIds, 'district_id');

                                        $districtNames = DB::table('districts')
                                            ->whereIn('id', $districtIdArray)
                                            ->pluck('name');
                                        ?>

                                        @if ($districtNames->isNotEmpty())
                                            <li><strong>Allowed Districts:</strong> {{ $districtNames->implode(', ') }}</li>
                                        @endif
                                    @endif

                                    <li><strong>Job Location:</strong> {{$data->location}}</li>
                                    <li>
                                        @if ($data->salary_type == 3)
                                            <strong>Salary: </strong><span class="salary-range"> &#2547; Negotiable </span>
                                        @endif
                                        @if ($data->probation_priod)
                                            <strong>Probation Period : </strong> {{ $data->probation_priod }} &#2547; <strong><br> After Probation : </strong>{{ $data->after_probation_priod }} &#2547;
                                        @endif
                                        @if ($data->salary)
                                            <strong>Salary: &#2547; </strong> {{ $data->salary }}
                                        @endif
                                    </li>
                                    <li><strong>Gender:</strong> {{ $data->gender == 1 ? 'Male' : ($data->gender == 2 ? 'Female' : ($data->gender == 3 ? 'Both' : '')) }}</li>

                                    <li><strong>Application Deadline:</strong> {{$data->application_end_date}} </li>
                                </ul>
                            </div>
                        </div>
                        @if ($data->image)
                        <div class="sidebar-widget">
                            <div class="inner">
                                <div class="row m-n2">
                                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                        <img src="{{url("/image?w=450&img=$data->image")}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Share Post</h6>
                                <div class="row m-n2">
                                    <div class="col-xl-2 col-lg-2 col-sm-1 col-2 p-2">
                                        <a class="sharer" data-sharer="facebook" data-title="{{ $data->title }}" data-url="{{ url()->current() }}" title="Share Facebook">
                                            <i class="fa fa-facebook-square" style="font-size: 22px"></i>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-1 col-2 p-2">
                                        <a class="sharer" title="Share Twitter" data-sharer="twitter" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                            <i class="fa fa-twitter-square" style="font-size: 22px"></i>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-1 col-2 p-2">
                                        <a class="sharer" title="Share LinkedIn" data-sharer="linkedin" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                            <i class="fa fa-linkedin-square" style="font-size: 22px"></i>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-1 col-2 p-2">
                                        <a class="sharer" title="Share whatsApp" data-sharer="whatsapp" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                            <i class="fa fa-whatsapp" style="font-size: 22px"></i>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-1 col-2 p-2">
                                        <a class="copy-link" title="Copy Link" data-clipboard-text="{{ url()->current() }}">
                                            <i class="fa fa-copy" style="font-size: 22px"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-12 mb-5 pe-lg-5">
                    <div class="job-list-details">
                        <div class="job-details-head row mx-0">
                            <div class="company-logo col-auto">
                                @if ($data->jobCategoryImage)
                                    <a><img src="{{ storageImage($data->jobCategoryImage) }}" alt="Company Logo" style="max-width: 85px !important;"></a>
                                @endif
                            </div>
                            <div class="salary-type col-auto order-sm-3">
                                <span class="badge bg-success">{{ $data->jobTypeName }}</span>
                            </div>
                            <div class="content col">
                                <h5 class="title">{{$data->title}}</h5>
                                <ul class="meta">
                                    <li><i class="fa fa-map-marker"></i> {{$data->location}} </li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-details-body">
                            <h6 class="mb-3">Job Description</h6>
                            {!! $data->description !!}
                        </div>
                    </div>

                    <div class="share_post" style="margin-top: 35px;">
                        <h6 class="title" style="margin-bottom: 15px">Share Post</h6>
                        <div class="row m-n2">
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-4 p-2">
                                <a class="sharer text-primary" data-sharer="facebook" data-title="{{ $data->title }}" data-url="{{ url()->current() }}" title="Share Facebook">
                                    <i class="fa fa-facebook-square" style="font-size: 22px"></i>
                                    Facebook
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-4 p-2">
                                <a class="sharer text-dark" title="Share Twitter" data-sharer="twitter" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                    <i class="fa fa-twitter-square" style="font-size: 22px"></i>
                                    Twitter
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-4 p-2">
                                <a class="sharer text-info" title="Share LinkedIn" data-sharer="linkedin" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                    <i class="fa fa-linkedin-square" style="font-size: 22px"></i>
                                    LinkedIn
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-4 p-2">
                                <a class="sharer text-success" title="Share whatsApp" data-sharer="whatsapp" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                                    <i class="fa fa-whatsapp" style="font-size: 22px"></i>
                                    WhatsApp
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-4 p-2">
                                <a class="copy-link" title="Copy Link" data-clipboard-text="{{ url()->current() }}">
                                    <i class="fa fa-copy" style="font-size: 22px"></i>
                                    Copy Link
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job List Details End -->

            </div>
        </div>
    </div>
@endsection
