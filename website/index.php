<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISP Website Provider</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .navbar .navbar-text {
            font-size: 1rem;
            color: #666;
            padding-left: 1rem;
        }
        
        .hero {
            padding-top: 6rem;
            padding-bottom: 6rem;
            text-align: center;
            background-color: #f8f9fa;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #666;
        }

        .hero .btn {
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        .features {
            padding: 3rem 0;
            background-color: #f8f9fa;
        }

        .feature-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            transition: transform 0.3s ease;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .feature-card .card-body {
            flex-grow: 1;
        }

        .feature-card .card-title {
            font-size: 1.2rem;
        }

        .contact {
            padding: 3rem 0;
            background-color: #f8f9fa;
        }

        .contact h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .contact form {
            max-width: 400px;
            margin: 0 auto;
        }

        .contact form .form-group input,
        .contact form .form-group textarea {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 1rem;
        }

        .contact form .form-group textarea {
            height: 120px;
        }

        .contact form button[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .features .row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-wifi"></i> ISP Provider</a>
            <span class="navbar-text">Fast and Reliable Internet Services</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-server"></i> Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signin_options.php"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-4">Fast and Reliable Internet Services</h1>
                    <p class="lead">Experience seamless internet connection with our high-speed plans</p>
                    <a href="#" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="feature-card card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-tachometer-alt"></i> High-Speed Internet</h5>
                            <p class="card-text">Enjoy blazing fast internet speeds for all your online activities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-card card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-network-wired"></i> Reliable Network</h5>
                            <p class="card-text">Experience uninterrupted connectivity with our reliable network infrastructure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-card card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-headset"></i> 24/7 Customer Support</h5>
                            <p class="card-text">Our friendly support team is available round the clock to assist you with any queries or issues.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            &copy; 2023 ISP Provider. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
