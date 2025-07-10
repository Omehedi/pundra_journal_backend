<!-- Top Bar -->
<div class="top-bar d-flex flex-wrap justify-content-between align-items-center">
    <div class="contact-info">
        <i class="fas fa-map-marker-alt"  style="color: #9a2525;"></i> Rangpur Road, Thengamara, Bogura, Bangladesh
        &nbsp;&nbsp;
        <i class="fas fa-envelope" style="color: #9a2525;"></i> editortmcjournal@gmail.com
    </div>
    <a href="./admin_login.html" class="right-btn"><i class="fas fa-user-shield"></i> ADMIN PANEL</a>
</div>

<div class="logo-section position-relative text-center py-4">
    <img src="{{asset('frontend//images/logo.png')}}" alt="TMCJ Logo" class="img-fluid">
    <h1 class="fw-bold text-uppercase mb-2" style="color: #9a2525;">TMSS MEDICAL COLLEGE JOURNAL (TMCJ)</h1>
    <hr>
    <p class="mb-1">An Official Publication of TMSS Medical College</p>
    <div class="issn">ISSN: 2309-3234</div>
</div>


<!-- Navigation Bar -->
<nav class="main-nav navbar navbar-expand-lg sticky-top">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler collapsed ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="padding-top: 10px;">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link active">HOME</a>
                </li>

                <li class="nav-item dropdown custom-dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ABOUT US
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="{{url('/about_the_journal')}}">ABOUT THE JOURNAL</a></li>
                        <li><a class="dropdown-item" href="{{url('/call_for_paper')}}">CALL FOR PAPER</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{url('/editorial_Board')}}" class="nav-link">EDITORIAL BOARD</a>
                </li>

                <li class="nav-item dropdown custom-dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="issuesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ISSUES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="issuesDropdown">
                        <li><a class="dropdown-item" href="{{url('/archieve')}}">ARCHIVES</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown custom-dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="articleDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ARTICLE
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="articleDropdown">
                        <li><a class="dropdown-item" href="{{url('/browse_article')}}">BROWSE ARTICLE</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">ETHICAL GUIDELINE</a>
                </li>

                <li class="nav-item dropdown custom-dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="instructionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        INSTRUCTION
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="instructionDropdown">
                        <li><a class="dropdown-item" href="for_authors">FOR AUTHORS</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{url('/contact_us')}}" class="nav-link">CONTACTS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>