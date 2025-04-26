<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link rel="stylesheet" href="{{ asset('css/styleresetpass.css') }}">
</head>

<body>
    <div class="reset-pass-container">
        <h1>Forgot Your Password?</h2>
            <form id="reset-password-form">
                <div class="form-container">
                    <div>
                        <label for="password">New Password</label>
                        <input type="password" , id="password">
                    </div>
                    <div>
                        <label for="confPassword">Confirm Password</label>
                        <input type="password" , id="confPassword">
                    </div>
                    <div class="button-container">
                        <button type="submit" class="confirm-button">Confirm </button>
                    </div>
                </div>
            </form>
    </div>
    <script src="{{ asset('js/resetPass.js') }}"></script>
</body>

</html>