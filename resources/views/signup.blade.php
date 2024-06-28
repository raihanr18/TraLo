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
            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="social-login">
                    <button><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo"> Continue with Google</button>
                </div>
                <p style="text-align: center; margin: 10px 0;">or</p>
                <input type="text" name="fullname" placeholder="Full Name" required value="{{ old('fullname') }}">
                <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">Sign Up</button>
            </form>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <p style="text-align: center; margin-top: 10px;">Already have an account? <a href="{{ route('login') }}" class="create-account">Sign in to account</a></p>
        </div>
    </div>
</body>
</html>
