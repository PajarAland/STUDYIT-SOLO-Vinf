<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - StudyIT</title>
    <link rel="stylesheet" href="{{ asset('css/stylecontactus.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="container-fluid">
                <div class="nav-brand">
                    <img src="{{ asset('asset/image/logo.png') }}" alt="Logo">
                    <h1>StudyIT</h1>
                </div>
                <div class="nav-menu">
                    <div class="nav-list">
                        <ul>
                            <li><a href="{{ url()->previous() }}">Home</a></li>
                            <li><a href="{{ url()->previous() }}">Bootcamp</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" aria-expanded="false">Aldino</button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="editprofile.html" class="dropdown-item">Edit Profile</a>
                                        <a href="/" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="contact-header">
        <h2>CONTACT US</h2>
        <p>We'd love to hear from you! Any question or remarks? Just write us a message!</p>
    </section>

    <div class="contact-container">
        <div class="contact-info">
            <h3>CONTACT INFORMATION</h3>
            <p>Say something to start a live chat!</p>
            <p>📞 +62 XXX XXXX XXXX</p>
            <p>📧 studyit@gmail.com</p>
            <p>📍 Jl. In Dulu Aja No. 777, Kota Kenangan, 69420</p>
            <div class="social-icons">
                <a href="#">🌐</a>
                <a href="#">🌐</a>
                <a href="#">🌐</a>
            </div>
        </div>

        <!-- Form submission -->
        <form class="contact-form" action="{{ route('contact_us.store') }}" method="POST">
            @csrf
            <input type="text" name="First_name" placeholder="First Name" required>
            <input type="text" name="Last_name" placeholder="Last Name" required>
            <input type="email" name="Email" placeholder="Email" required>
            <input type="text" name="Phone_number" placeholder="Phone Number">
            <textarea name="Message" placeholder="Write your message.." required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <footer>
        <p>PT. Dikerjain Dua Orang</p>
        <p>Jl. In Dulu Aja No. 777, Kota Kenangan, 69420</p>
        <p>+62 XXX XXXX XXXX</p>
        <p>2024 All Rights Reserved ©</p>
    </footer>

    <script src="{{ asset('js/scriptContactUS.js') }}"></script>
</body>
</html>
