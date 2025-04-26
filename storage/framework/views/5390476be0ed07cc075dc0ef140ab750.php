<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIT | Find your way in a Good Way</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleindexuser.css')); ?>"">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_down" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar  -->
    <header>
        <div class="navbar">
            <div class="container-fluid">
                <div class="nav-brand">
                    <img src="<?php echo e(asset('image/logo.png')); ?>" alt="Logo">
                    <h1>StudyIT</h1>
                </div>
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <div class="nav-menu">
                    <div class="nav-list">
                        <ul>
                            <li>
                                <span>
                                    <a href="#home">Home</a>
                                </span>
                            </li>
                            <li>
                                <a href="#bootcamp">Bootcamp</a>
                            </li>
                            <li>
                                <a href="/page/contactus.html">Contact Us</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" aria-expanded="false">Aldino</button>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        <a href="editprofile.html" class="dropdown-item">Edit Profile</a>

                                        <a href="../index.html" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- End Navbar Section -->

    <!-- CTA Section -->
    <main>
        <div class="hero">
            <div class="content">
                <h1>Join The Next Generation Of</h1>
                <h1><span>Tech Innovators</span></h1>
                <h2>Learn the skills you need to succeed in the it industry in just 12 weeks</h2>
            </div>
            <div class="content-image">
                <img src="<?php echo e(asset('image/landing.png')); ?>" alt="" class="img-content">
            </div>
        </div>
        <div class="content-container">
            <input type="text" name="search" id="search" class="search-input" placeholder="What are you looking for ?">
            <h1 class="bootcamp" id="bootcamp">Courses</h1>
            <div class="row">
                <div class="container" id="course-container">
                    <div class="card" id="course-template" style="width: 18rem; display: none;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-title"></p>
                            <p class="card-level"></p>
                            <div class="date-container">
                                <img src="../asset/image/date.png" alt="Date Icon">
                                <p class="date-card"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Bootcamp Section -->
    <footer id="contactus">
        <p>PT. Dikerjain Dua Orang</p>
        <p>Jl. In Dulu Aja No. 777, Kota Kenangan, 69420</p>
        <p>+62 XXX XXXX XXXX</p>
        <span>
            <p>2024 All Rights Reserved ©</p>
        </span>
    </footer>

    <script src="<?php echo e(asset('js/homePage.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/user/loggedin.blade.php ENDPATH**/ ?>