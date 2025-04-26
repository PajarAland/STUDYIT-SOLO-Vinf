<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your StudyIT Account</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleregister.css')); ?>">
</head>
<body>
    <div class="register-container">
        <h1>Create Your StudyIT Account</h1>
        <div class="signin-prompt">
            <h3>Already have a StudyIT Account?</h3>
            <a href="/login">Sign in</a>
        </div>
        <form action="">
            <div class="register-forms">
                <div>
                    <label for="name">Username</label>
                    <input type="text" id="name" required>
                </div>
                <div>
                    <label for="name">First Name</label>
                    <input type="text" id="name" required>
                </div>
                <div>
                    <label for="name">Last Name</label>
                    <input type="text" id="name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" required>
                </div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" required>
                </div>
                <div>
                    <label for="newPass">Password</label>
                    <input type="password" id="newPass" maxlength="20" required>
                </div>
                <div>
                    <label for="confNewPass">Confirm Password</label>
                    <input type="password" id="confNewPass" minlength="8" maxlength="20" required>
                    <h5>Password Must At Least Contain 8 Characters</h5>
                </div>
                <div class="button-container">
                    <button class="register-button" onclick="submitRegister()">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <script src="<?php echo e(asset('js/register.js')); ?>"></script>
</body>
</html><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/Auth/register.blade.php ENDPATH**/ ?>