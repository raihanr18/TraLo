<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Reset Password?</h2>
            
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif

            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('resetPassword') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ session('otp_email') }}">
                <input type="password" name="password" placeholder="New Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
