<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        @if (session('success'))
            <div class="w3-panel w3-green w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                <h3>Success!</h3>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                <h3>Error!</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div class="alert alert-success w3-green">
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger w3-red">
                {{ session('error') }}
            </div>
        @endif

        <div class="login-image"></div>
        <div class="login-form">
            <h2>Silahkan Login</h2>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="social-login">
                    <button><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo"> Continue with Google</button>
                </div>
                <p style="text-align: center; margin: 10px 0;">or</p>
                <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password">
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <label for="rememberMe">Remember me</label>
                </div>
                <a href="{{ route('forgotpassword') }}" class="forgot-password">Forgot Password?</a>
                <button type="submit">Log In</button></a>
            </form>
            <p style="text-align: center; margin-top: 10px;">Don't have an account yet? <a href="{{ route('signup') }}" class="create-account">Create account</a></p>
        </div>
    </div>
</body>
</html>
