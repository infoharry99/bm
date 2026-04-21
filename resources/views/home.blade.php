<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bihari Muslim UK</title>
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

            .

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
        @include('layouts.navbar')

        <div class ="section" style="padding:0 !important;"> 
            <img src="/homebanner.jpg" alt="Image" style="width:100%; object-fit:cover; border-radius:10px;">
        </div>  

        <!-- ✅ ABOUT US -->
        <div class="section">
            <div class="text">
                <h2>About Us</h2>
                <p>Purpose:
                    The Bihari Muslim Group (UK) is a friendly and welcoming community for people in the
                    UK who have a connection to Bihar through birth or family. We bring Biharis together to stay connected, make new friends, and celebrate our culture, language, 
                    traditions, and food. Through social gatherings and events, families meet, old memories return, and new bonds are formed. We support each other socially,
                    emotionally, and spiritually, guided by Islamic values of compassion, brotherhood, and service. Our aim is to build a united and strong community that preserves our identity, 
                    encourages education and professional growth, 
                    strengthens families, and helps our children grow with confidence and good character. We also want to give back by supporting charitable causes in Bihar and beyond, and by creating a trusted matrimony network to help families find suitable matches. Together, we work to build a caring, connected, and faith-centered community that contributes positively to wider society.
                </p>
            </div>
        </div>

        <!-- ✅ TEAM -->
        <div class="section">
            <div class="row reverse">
                <div class="image">
                    <div class="img-holder">
                        <img src="./img/event-2.jpg" alt="Banner 3">
                    </div>
                </div>
                <div class="text">
                    <h2>Meet the Team</h2>
                    <p>Our dedicated team is a diverse group of passionate volunteers committed to serving the Bihari Muslim community in the UK. With experience across education, social work, event management, and community leadership, we work collaboratively to strengthen unity, support families, empower youth, and uphold our cultural and Islamic values through meaningful initiatives and services.</p>
                </div>
            </div>
        </div>

 @include('layouts.footer')
    