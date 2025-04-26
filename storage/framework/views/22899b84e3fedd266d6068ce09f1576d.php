<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to StudyIT</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelogin.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="login-container">
        <h1>Login to StudyIT</h1>
        <h5>Please Enter Your Information Below</h5>
        <form id="loginForm">
            <div class="forms">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" required>
                </div>
                <div class="password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" required>
                </div>
            </div>
            <div class="options">
                <input type="checkbox" id="checkbox">
                <label for="checkbox">Remember Me</label>

                <a href="/page/resetPass.html">Forgot Password?</a>
            </div>
            <div class="button-container">
                <button type="button" class="login-button" onclick="submitLogin()">Login</button>
            </div>
        </form>
    </div>
    <script src="/js/login.js"></script>
</body>

</html>
<?php /**PATH C:\WEBPRO\WebStudyIT\resources\views/Auth/login.blade.php ENDPATH**/ ?>