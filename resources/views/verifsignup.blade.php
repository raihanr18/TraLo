<!DOCTYPE html>
<html>
<head>
    <title>Verification Sign Up</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Verification Sign Up</h2>
            <form method="POST" action="{{ route('verify') }}">
                @csrf
                <input type="text" name="token" placeholder="OTP Code" required>
                <button type="submit">Verify</button>
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
            
        </div>
    </div>
</body>
</html>
