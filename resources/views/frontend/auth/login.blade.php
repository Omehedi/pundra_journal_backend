<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TMSS Medical College Journal - Login</title>
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend//fontawesome/css/all.min.css')}}" />
</head>
<body class="bg-light">

<!-- Header -->
<header class="text-white text-center py-4 fw-semibold fs-5" style="background-color: #003272;">
    Welcome to the TMCJ Manuscript Submission Portal
</header>

<!-- Login Section -->
<main class="d-flex justify-content-center align-items-center min-vh-100 px-2">
    <div class="card shadow rounded-4 p-3 p-sm-4 w-100" style="max-width: 480px;">
        <h3 class="fw-bold text-center mb-3" style="color: #003272;">Sign in</h3>

        <div class="d-grid mb-3">
            <button type="button" class="btn btn-success fw-semibold">
                <i class="me-2"></i> TMSS Medical College Journal
            </button>
        </div>

        <div class="text-center text-muted small mb-3">OR SIGN IN WITH EMAIL</div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <div class="input-group">
                <input
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Enter password"
                        aria-describedby="togglePassword"
                />
                <span class="input-group-text bg-white" id="togglePassword" style="cursor: pointer;">
            <i class="fas fa-eye-slash" id="toggleIcon"></i>
          </span>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe" />
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <a href="#" class="text-decoration-none small text-primary">Forgot Password?</a>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn fw-semibold" style="background-color: #003272; color: white;">
                <i class="fas fa-lock me-2"></i> Sign in
            </button>
        </div>

        <p class="text-center small mb-0">
            Don’t have an account?
            <a href="./registration_form.html" class="fw-semibold text-success text-decoration-none">Register Now</a>
        </p>
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
