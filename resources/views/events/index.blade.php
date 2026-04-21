<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HELPZ - Free Charity Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
        
            .row {
                display: flex;
                gap: 20px;
                padding: 20px;
                justify-content: center;
                flex-wrap: wrap;
            }
        
            .image {
                flex: 1;
                min-width: 250px;
            }
        
            .img-holder {
                width: 100%;
                height: 500px;      /* ✅ Keeps same size */
                background: #ccc;
                border: 2px dashed #888;
                border-radius: 10px;
                overflow: hidden;
                position: relative;
            }
        
            .img-holder img {
                width: 100%;
                height: 100%;
                object-fit: cover;  /* ✅ Keeps image inside same size without distortion */
            }
        </style>



        <style>



            body {
                margin: 0;
                font-family: Arial, sans-serif;
                background: #f5f5f5;
                color: #222;
                line-height: 1.6;
            }
        
            .section {
                padding: 60px 10%;
                background: white;
                margin-bottom: 20px;
                border-radius: 10px;
            }
        
            h2 { margin-top: 0; }
        
            .row {
                display: flex;
                gap: 40px;
                align-items: center;
                flex-wrap: wrap;
            }
        
            .row.reverse { flex-direction: row-reverse; }
        
            .text, .image {
                flex: 1;
                min-width: 300px;
            }
        
            .img-holder {
                width: 100%;
                height: 500px;
                background: #cccccc;
                border: 2px dashed #888;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #555;
                font-size: 18px;
                border-radius: 10px;
            }
        
            /* Gallery Grid */
            .gallery-year {
                margin-top: 40px;
            }
            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 15px;
            }
            .gallery-grid .img-holder {
                height: 180px;
            }
        
            @media (max-width: 768px) {
                .gallery-grid { grid-template-columns: repeat(2, 1fr); }
            }


            /* FIXED NAVBAR */
            .navbar {
                position: fixed !important;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 9999;
                 background: #20212b !important;
                transition: background 0.3s ease;
                padding: 10px 20px;
            }

            /* Background becomes stronger after scroll */
            .navbar.scrolled {
               background: #20212b !important;
            }
            body {
                padding-top: 65px; /* adjust based on navbar height */
            }


        </style>
        

    </head>

    <body>

    <!-- <div class ="section"> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <!-- <div class="container"> -->
                <!-- <a class="navbar-brand" href="/">Bihari Muslim Group UK</a> -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#mainMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/members" class="nav-link">Members</a></li>
                        <li class="nav-item"><a href="/events" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="/gallerry" class="nav-link">Gallery</a></li>
                        <li class="nav-item"><a href="/bihar-news" class="nav-link">Bihar News</a></li>
                    </ul>
                </div>
            <!-- </div> -->
        </nav>
    <!-- </div> -->

        <div class="container mt-4">
            <h2>Future Events</h2>
            @foreach($future as $e)
                <div class="card p-3 mt-2">
                    <h4>{{ $e->title }}</h4>
                    <p>{{ $e->details }}</p>
                    <small>Date: {{ $e->event_date }}</small>
                </div>
            @endforeach
        
            <h2 class="mt-5">Past Events</h2>
            @foreach($past as $e)
                <div class="card p-3 mt-2 bg-light">
                    <h4>{{ $e->title }}</h4>
                    <p>{{ $e->details }}</p>
                    <small>Date: {{ $e->event_date }}</small>
                </div>
            @endforeach
        </div>



        <!-- Footer Start -->
         <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="footer-contact">
                            <h2>Our Head Office</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Vista Business Centre,Salisbury Rd, Cranford, Hounslow TW4 6JQ, United Kingdom</p>
                            <p><i class="fa fa-envelope"></i>info@iharimuslim.co.uk</p>
                            <div class="footer-social">
                                <a class="btn btn-custom" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">Contact Us</a>
                            <a href="">Upcoming Events</a>
                            <a href="">Latest Blog</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
                            <a href="/cookies">Privacy policy</a>
                            <a href="/cookies">Cookies</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn btn-custom">Submit</button>
                                <label>Don't worry, we don't spam!</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="#">biharimuslim</a>, All Right Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p>Designed By <a href="www.sofinish.co.uk">Sofinish Technologies</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/parallax/parallax.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script>
        window.addEventListener("scroll", function () {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 20) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
        </script>

    </body>
</html>