<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Sign Up</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="social-login">
                    <button><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo"> Continue with Google</button>
                </div>
                <p style="text-align: center; margin: 10px 0;">or</p>
                <input type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}">
                <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password" placeholder="Confirm Password">
       
                <button type="submit">Log In</button>
            </form>
            <p style="text-align: center; margin-top: 10px;">Already have an account? <a href="{{ route('login') }}" class="create-account">Sign in to account</a></p>
        </div>
    </div>
</body>
</html>