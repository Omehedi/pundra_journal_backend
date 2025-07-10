<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
@php
    $config = configs(['logo', 'app_name']);
@endphp
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIGN IN | {{isset($config['app_name']) ? $config['app_name'] : ''}}</title>
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend//fontawesome/css/all.min.css')}}" />
</head>
<body class="bg-light" style="
  background-image: url('{{asset('frontend/images/admin.jpeg')}}');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
">
<main class="d-flex flex-column justify-content-center align-items-center min-vh-100 px-2">

    <div class="mb-3 text-center">
        <img src="{{asset('frontend/images/logo.png')}}" alt="TMCJ Logo" class="img-fluid" style="max-width: 120px;">
    </div>

    <!-- Login Card -->
    <div class="card shadow rounded-4 p-3 p-sm-4 w-100" style="max-width: 480px; background-color: white;">
        @if (session('successMessage'))
            <div class="text-success text-center mb-2"
                 style="background: #ffffff;height: 29px;border-radius: 10px;padding-top: 6px;">
                <p>{{ session('successMessage') }}</p>
            </div>
        @endif
        <h3 class="fw-bold text-center mb-3" style="color: #003272;">Sign in</h3>

        <div class="d-grid mb-3">
            <button type="button" class="btn btn-success fw-semibold">
                <i class=" me-2"></i> {{isset($config['app_name']) ? $config['app_name'] : ''}}
            </button>
        </div>

        <div class="text-center text-muted small mb-3">Sign in to continue In Dashboard.</div>
            <form action="{{ url('admin') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" name="email" class="form-control" id="email"
                           placeholder="Enter Email">
                </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" name="password"
                       class="form-control pe-5 password-input"
                       placeholder="Enter password" id="password-input">
                <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                        type="submit" id="password-addon"><i
                            class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                       id="auth-remember-check">
                <label class="form-check-label" for="auth-remember-check">Remember
                    me</label>
            </div>
            <a href="#" class="text-decoration-none small text-primary">Forgot Password?</a>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn fw-semibold" style="background-color: #003272; color: white;">
                <i class="fas fa-lock me-2"></i> Sign in
            </button>
        </div>
            </form>
    </div>

</main>

<!-- Bootstrap & Script -->
<script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>

<script>
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const icon = togglePasswordButton.querySelector('i');

    togglePasswordButton.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
