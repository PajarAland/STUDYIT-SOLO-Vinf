<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIT | Find your way in a Good Way</title>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleindexuser.css')); ?>">
    

</head>

<body>
    <!-- Navbar  -->
    <header id="home">
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
                                <a href="#footer">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-button">
                        <li>
                            <button class="btnLogin">
                                <a href="/login">Login</a>
                            </button>
                        </li>
                        <li>
                            <button class="btnSignup">
                                <a href="/register">Sign Up </a>
                            </button>
                        </li>
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
                <input class="btn btn-primary btn-lg" id="cta" type="submit" value="Enroll" onclick="navigatePayment()">
            </div>
            <div class="content-image">
                <img src="<?php echo e(asset('image/landing.png')); ?>" alt="" class="img-content">
            </div>
        </div>
        <div class="benefits-container">
            <div class="title-benefits">
                <h1>Program Highlight</h1>
            </div>
            <div class="content-benefits">
                <ol>
                    <li><span>Updated Curriculum:</span> Learn the latest in-demand technology skills in the industry
                    </li>
                    <li><span>Experienced Mentors:</span> Get direct guidance from seasoned developers with extensive
                        experience</li>
                    <li><span>Hands-On Focus:</span> Not just theory! Every module includes real-world projects to
                        sharpen your skills.</li>
                    <li><span>Flexible Learning Schedule:</span> Designed for everyone—from students to working
                        professionals.</li>
                </ol>
            </div>
        </div>

        </div>
        <div class="testimoni-container">
            <div class="content-testimoni">
                <p>“This bootcamp transformed my career! From having zero tech background, I’m now working as a Junior
                    Developer at a reputable company.”</p>
                <span>
                    <p>- Sinta, Class of 2023</p>
                </span>
                <p>"The program is clear, mentors are always ready to help, and the curriculum is spot-on. I highly
                    recommend this bootcamp!"</p>
                <p>- Dimas, Class of 2022</p>
            </div>
            <div class="title-testimoni">
                <h1>Student Testimonials</h1>
            </div>

        </div>

        <!-- Bootcamp Template Card -->
        <div class="bootcamp-container">
            <h1 class="bootcamp" id="bootcamp">Courses</h1>
            <div class="row">
                <div class="container" id="course-container" >
                    <div class="card" id="course-template" style="width: 18rem; display: none;" data-id="">
                        <img src="" class="card-img-top" id="cover" alt="">
                        <div class="card-body">
                            <p class="card-title"></p>
                            <!-- <p class="card-level">Level : </p> -->
                            <div class="date-container">
                                <img src="<?php echo e(asset('image/date.png')); ?>" alt="Date Icon">
                                <p class="date-card"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End CTA Section -->



    </main>


    <footer id="footer">
        <div class="container-content-footer">
            <div class="container-logo">
                <img src="<?php echo e(asset('image/Group.png')); ?>" alt="">
            </div>
            <div class="container-footer">
                <h1>StudyIT</h1>
                <div class="container-list">
                    <div class="About-us">
                        <h2>About Us</h2>
                        <div class="content-about">
                            <ul>
                                <li>Team</li>
                                <li>Mission</li>
                                <li>Newsletter</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Support">
                        <h2>Support</h2>
                        <div class="content-support">
                            <ul>
                                <li><a href="/page/contactus.html">Contact</a></li>
                                <li>FAQ's</li>
                                <li>Subscription</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Socials">
                        <h2>Social</h2>
                        <div class="content-socials">
                            <ul>
                                <li>Instagram</li>
                                <li>Youtube</li>
                                <li>Linkedin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-copyright">
            <div class="copyright">
               
                    <p>© 2024 All Rights Reserved </p>
               
                <span>
                    <p>Terms and Condition</p>
                </span>
            </div>
            <div class="back-top">
                <a href="#home">
                    <p>Back to Top</p>
                </a>
                <img src="<?php echo e(asset('image/arrowup.png')); ?>" alt="">
            </div>
        </div>
        </div>
    </footer>
    <script src="<?php echo e(asset('js/landingPage.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Telkom University\Semester 5\Perancangan dan Pemrograman Web\Tubes\WebStudyIT\resources\views/index.blade.php ENDPATH**/ ?>