@extends('frontend.layout.master')
@section('content')
<!-- Main Content start -->
<div class="container my-5">
    <div class="row g-4">
        <!-- Left Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item border-0 rounded mb-2 p-0">
                            <a href="./login.html" class="custom-btn-active d-flex align-items-center px-3 py-2">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </a>
                        </li>
                        <li class="list-group-item border-0 rounded mb-2 p-0">
                            <a href="" class="custom-btn d-flex align-items-center px-3 py-2">
                                <i class="fas fa-upload me-2"></i> Submit Article
                            </a>
                        </li>
                        <li class="list-group-item border-0 rounded mb-2 p-0">
                            <a href="#" class="custom-btn d-flex align-items-center px-3 py-2">
                                <i class="fas fa-user me-2"></i> Join as Reviewer
                            </a>
                        </li>

                    </ul>

                    <hr>

                    <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                        <h6 class="fw-bold mb-3 text-danger d-flex align-items-center"> Published Articles</h6>

                        <li class="list-group-item border-0 rounded mb-2 p-0">
                            <a href="" class="custom-btn d-flex align-items-center px-3 py-2">
                                <i class="fa-solid fa-file-pdf me-2"></i> BUSINESS.PDF
                            </a>
                        </li>
                        <li class="list-group-item border-0 rounded mb-2 p-0">
                            <a href="#" class="custom-btn d-flex align-items-center px-3 py-2">
                                <i class="fa-solid fa-file me-2"></i> CONSULTANT.DOC
                            </a>
                        </li>
                    </div>

                    <hr>

                    <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                        <h6 class="fw-bold mb-3 text-danger d-flex align-items-center">
                            <i class="fa-solid fa-headset me-2" style="width: 20px;"></i> Online Support
                        </h6>

                        <div class="d-flex align-items-start mb-2">
                            <i class="fa-solid fa-phone-volume text-dark me-2 fs-6" style="width: 20px;"></i>
                            <a href="tel:+8801733369130" class="text-dark text-decoration-none">+8801733-369130</a>
                        </div>

                        <div class="d-flex align-items-start mb-0">
                            <i class="fa-regular fa-clock text-muted me-2" style="width: 20px;"></i>
                            <p class="small text-muted mb-0">24 hours online support</p>
                        </div>

                        <div class="d-flex align-items-start mt-3">
                            <i class="fa-regular fa-calendar text-muted me-2" style="width: 20px;"></i>
                            <div class="small text-muted fst-italic">Last Update: 21-06-2025</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Card -->
        <div class="col-lg-8">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <div class="border-bottom border-3 border-danger pb-2 mb-3">
                        <h6 class="card-title pt-2 fw-bold">Year: July 2024 , Issue: Volume 23, No. 02, July 2024</h6>
                    </div>
                    <div class="row mt-3 card-body">
                        <!-- Cover Image -->
                        <div class="col-md-2 col-sm-12">
                            <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                        </div>

                        <!-- Article Details -->
                        <div class="col-md-10 col-sm-12">
                            <div class="mb-1 text-secondary small">Case Report</div>
                            <div class="fw-bold">
                                <a href="{{url('/article_details')}}" class="text-decoration-none text-dark">
                                    A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman
                                </a>
                            </div>
                            <div class="text-muted small">
                                Nitu SA <sup>1</sup>, Rahman DA <sub>2</sub>
                            </div>
                            <div class="small mt-1">
                                <span class="fw-semibold">DOI:</span>
                            </div>
                            <div class="mt-2">
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-primary me-2">
                                    Full Text <i class="fa fa-download"></i>
                                </a>
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-danger">
                                    PDF <i class="fa fa-file-pdf-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 card-body">
                        <!-- Cover Image -->
                        <div class="col-md-2 col-sm-12">
                            <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                        </div>

                        <!-- Article Details -->
                        <div class="col-md-10 col-sm-12">
                            <div class="mb-1 text-secondary small">Case Report</div>
                            <div class="fw-bold">
                                <a href="{{url('/article_details')}}" class="text-decoration-none text-dark">
                                    A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman
                                </a>
                            </div>
                            <div class="text-muted small">
                                Nitu SA <sup>1</sup>, Rahman DA <sub>2</sub>
                            </div>
                            <div class="small mt-1">
                                <span class="fw-semibold">DOI:</span>
                            </div>
                            <div class="mt-2">
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-primary me-2">
                                    Full Text <i class="fa fa-download"></i>
                                </a>
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-danger">
                                    PDF <i class="fa fa-file-pdf-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 card-body">
                        <!-- Cover Image -->
                        <div class="col-md-2 col-sm-12">
                            <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                        </div>

                        <!-- Article Details -->
                        <div class="col-md-10 col-sm-12">
                            <div class="mb-1 text-secondary small">Case Report</div>
                            <div class="fw-bold">
                                <a href="{{url('/article_details')}}" class="text-decoration-none text-dark">
                                    A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman
                                </a>
                            </div>
                            <div class="text-muted small">
                                Nitu SA <sup>1</sup>, Rahman DA <sub>2</sub>
                            </div>
                            <div class="small mt-1">
                                <span class="fw-semibold">DOI:</span>
                            </div>
                            <div class="mt-2">
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-primary me-2">
                                    Full Text <i class="fa fa-download"></i>
                                </a>
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-danger">
                                    PDF <i class="fa fa-file-pdf-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 card-body">
                        <!-- Cover Image -->
                        <div class="col-md-2 col-sm-12">
                            <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                        </div>

                        <!-- Article Details -->
                        <div class="col-md-10 col-sm-12">
                            <div class="mb-1 text-secondary small">Case Report</div>
                            <div class="fw-bold">
                                <a href="{{url('/article_details')}}" class="text-decoration-none text-dark">
                                    A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman
                                </a>
                            </div>
                            <div class="text-muted small">
                                Nitu SA <sup>1</sup>, Rahman DA <sub>2</sub>
                            </div>
                            <div class="small mt-1">
                                <span class="fw-semibold">DOI:</span>
                            </div>
                            <div class="mt-2">
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-primary me-2">
                                    Full Text <i class="fa fa-download"></i>
                                </a>
                                <a href="https://tmcjournal.org/upload/upload_paper/202506220342Case Report - A Rare Case of Vulvar Angiomyofibroblastoma in a Young Woman.pdf" class="btn btn-sm btn-outline-danger">
                                    PDF <i class="fa fa-file-pdf-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="text-center mb-2">
                  <a href="" class="btn btn-danger btn-sm rounded-pill px-4 ">
                    See More
                  </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- main content end  -->
@endsection