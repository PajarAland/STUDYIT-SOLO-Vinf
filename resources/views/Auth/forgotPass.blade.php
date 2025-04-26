<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link rel="stylesheet" href="{{ asset('css/styleforgotpass.css') }}">
</head>

<body>
    <div class="reset-pass-container">
        <h1>Forgot Your Password?</h2>
            <h3>Enter your email for verification</h3>
            <form id="forgot-password-form">
                <div class="form-container">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="confirm-button">Confirm</button>
                    </div>
                </div>
            </form>
            <script src="{{ asset('js/forgotPass.js') }}"></script>
    </div>
</body>

</html>