@extends('frontend.layout.master')
@section('content')
<!-- About Section Start -->
<section class="about-section">
    <div class="bg-overlay">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-8">
                    <div class="client-details bg-white p-3 p-md-4 rounded shadow-sm">
                        <h3 class="mb-3 mb-md-4">About The Journal</h3>
                        <p class="mb-3">
                            The <strong>TMSS Medical College Journal (TMCJ)</strong> is published two times a year (January and July). The TMSS Medical College Journal (TMCJ) is approved by
                            <strong>Bangladesh Medical &amp; Dental Council (BM&amp;DC/4-D-2016/1478: Dated 15.01.2017)</strong>. It accepts original articles, review articles and case reports. While every effort is made by the Editorial Board and the Journal Committee to avoid inaccuracies, the responsibility of the content lies with the author(s). The Journal Committee accepts no liability for any misleading information or opinions.
                        </p>
                        <p class="highlight mb-3">ISSN: 2309-3234</p>
                        <p class="highlight mb-3">Language of Publication: English</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2 text-success fs-6">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Online Submission</strong>
                            </li>
                            <li class="mb-2 text-success fs-6">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Higher impact with wider visibility</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0 mt-4 mt-lg-0">
                    <div class="submit-box h-100 d-flex flex-column justify-content-center text-center p-3">
                        <p class="mb-3">We are accepting new manuscripts. Please submit your manuscript to us.</p>
                        <a href="./login.html" class="btn btn-danger btn-rounded px-3 px-md-4 py-2">
                            <i class="fas fa-sign-in-alt me-2"></i>Click Here to Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold mb-2" style="color:#337ab7 !important;">CURRENT ISSUE</h4>
                <hr class="mt-0 mb-3" style="width: 120px; height: 2px; background-color: #337ab7; opacity: 1;">
                <div class="container my-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto p-2">
                                        <a href="https://tmcjournal.org/upload/upload_journal/202506210624TMC Journal.pdf" title="Download PDF" class="text-decoration-none text-center d-block">
                                            <img src="https://tmcjournal.org/upload/cover_photo/202506210624Journal 23 No.2.jpg" alt="Title Cover" class="img-fluid rounded" style="max-width: 130px;">
                                            <div class="text-danger fw-semibold small mt-1">Download PDF</div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body p-2">
                                            <div class="fw-bold text-dark">Volume 23, No. 02, July 2024</div>
                                            <div class="text-muted small">Published: July 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow-sm rounded h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto p-2">
                                        <a href="https://tmcjournal.org/upload/upload_journal/202506210624TMC Journal.pdf" title="Download PDF" class="text-decoration-none text-center d-block">
                                            <img src="https://tmcjournal.org/upload/cover_photo/202506210624Journal 23 No.2.jpg" alt="Title Cover" class="img-fluid rounded" style="max-width: 130px;">
                                            <div class="text-danger fw-semibold small mt-1">Download PDF</div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body p-2">
                                            <div class="fw-bold text-dark">Volume 23, No. 02, July 2024</div>
                                            <div class="text-muted small">Published: July 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow-sm rounded h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto p-2">
                                        <a href="https://tmcjournal.org/upload/upload_journal/202506210624TMC Journal.pdf" title="Download PDF" class="text-decoration-none text-center d-block">
                                            <img src="https://tmcjournal.org/upload/cover_photo/202506210624Journal 23 No.2.jpg" alt="Title Cover" class="img-fluid rounded" style="max-width: 130px;">
                                            <div class="text-danger fw-semibold small mt-1">Download PDF</div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body p-2">
                                            <div class="fw-bold text-dark">Volume 23, No. 02, July 2024</div>
                                            <div class="text-muted small">Published: July 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class=" card shadow-sm rounded h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto p-2">
                                        <a href="https://tmcjournal.org/upload/upload_journal/202506210624TMC Journal.pdf" title="Download PDF" class="text-decoration-none text-center d-block">
                                            <img src="https://tmcjournal.org/upload/cover_photo/202506210624Journal 23 No.2.jpg" alt="Title Cover" class="img-fluid rounded" style="max-width: 130px;">
                                            <div class="text-danger fw-semibold small mt-1">Download PDF</div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="card-body p-2">
                                            <div class="fw-bold text-dark">Volume 23, No. 02, July 2024</div>
                                            <div class="text-muted small">Published: July 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <h6 class="fw-bold border-bottom border-3 border-danger pb-2 mb-3 ">Recently Published Articles</h6>
                <div class="row card-body">
                    <!-- Cover Image -->
                    <div class="col-md-2 col-sm-12">
                        <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                    </div>

                    <!-- Article Details -->
                    <div class="col-md-10 col-sm-12">
                        <div class="mb-1 text-secondary small">Case Report</div>
                        <div class="fw-bold">
                            <a href="https://tmcjournal.org/home/article/details/183" class="text-decoration-none text-dark">
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
                <div class="row card-body">
                    <!-- Cover Image -->
                    <div class="col-md-2 col-sm-12">
                        <img src="https://tmcjournal.org/upload/cover/202506220342Journal 23 No.2.jpg" class="img-fluid rounded" alt="Title Cover">
                    </div>

                    <!-- Article Details -->
                    <div class="col-md-10 col-sm-12">
                        <div class="mb-1 text-secondary small">Case Report</div>
                        <div class="fw-bold">
                            <a href="https://tmcjournal.org/home/article/details/183" class="text-decoration-none text-dark">
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

                <div class="text-center">
                    <a href="./browse_article.html" class="btn btn-danger btn-sm rounded-pill px-4">
                        Read more articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection