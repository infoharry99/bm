@extends('layouts.master')
		
@section('content')
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{ asset('img/S1.webp') }}')">
				<div class="container">
					<div class="row">
					<div class="col-lg-7">
						<div class="text">
						<h1 style="color: #000">
							Full-Stack <span>Ecommerce</span> & <span>Brand-Building</span> Services You Can Trust
						</h1>
						<p style="color: #000">
							We help DTC and emerging brands grow, scale, and lead in the digital economy with a powerful mix of strategy, creativity, and ecommerce execution.
						</p>
						<div class="button">
							<a href="{{ url('/appointment') }}" class="btn">Book Consultation</a>
							<!-- <a href="{{ url('/about') }}" class="btn primary">Learn More</a> -->
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
				<!-- End Single Slider -->

				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{ asset('img/N1.webp') }}')">
				<div class="container">
					<div class="row">
					<div class="col-lg-7">
						<div class="text">
						<h1 style="color: #000">
							Build a <span>Scalable Brand</span> for the Future of Commerce
						</h1>
						<p style="color: #000">
							Our team of strategists, creatives, and tech experts work together to turn vision into value — with data-driven, future-ready ecommerce solutions.
						</p>
						<div class="button">
							<a href="{{ url('/appointment') }}" class="btn">Get Started</a>
							<!-- <a href="{{ url('/about') }}" class="btn primary">About Us</a> -->
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
				<!-- End Single Slider -->

			</div>
		</section>

		<!--/ End Slider Area -->
		
		<!-- Start BRNDS Service Area -->
			<section class="schedule ecommerce-services mt-5">
			<div class="container">
				<div class="schedule-inner">
				<div class="row">

					<!-- Brand Strategy -->
					<div class="col-lg-4 col-md-6 col-12">
					<div class="single-schedule first">
						<div class="inner">
						<div class="icon">
							<i class="fa fa-lightbulb-o"></i>
						</div>
						<div class="single-content">
							<span>Future-Ready</span>
							<h4>Brand Strategy</h4>
							<p>We help CEOs and founders of SMEs craft brand strategies that win in highly competitive global and tech-driven markets.</p>
							<a href="#brand-strategy">LEARN MORE <i class="fa fa-long-arrow-right"></i></a>
						</div>
						</div>
					</div>
					</div>

					<!-- Ecommerce Transformation -->
					<div class="col-lg-4 col-md-6 col-12">
					<div class="single-schedule middle">
						<div class="inner">
						<div class="icon">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="single-content">
							<span>Growth-Driven</span>
							<h4>Ecommerce Enablement</h4>
							<p>We help brands place Ecommerce at the center of growth — especially in fast-growing segments like food, wellness, and fashion.</p>
							<a href="#ecommerce">LEARN MORE <i class="fa fa-long-arrow-right"></i></a>
						</div>
						</div>
					</div>
					</div>

					<!-- Technology + AI Integration -->
					<div class="col-lg-4 col-md-12 col-12">
					<div class="single-schedule last">
						<div class="inner">
						<div class="icon">
							<i class="fa fa-cogs"></i>
						</div>
						<div class="single-content">
							<span>Smart Solutions</span>
							<h4>Technology & AI</h4>
							<p>Our expert team blends Ecommerce platforms with the latest AI tools to deliver scalable, intelligent solutions for your brand.</p>
							<a href="#technology">LEARN MORE <i class="fa fa-long-arrow-right"></i></a>
						</div>
						</div>
					</div>
					</div>

				</div>
				</div>
			</div>
			</section>
			<!-- End BRNDS Service Area -->


		<!-- Start Features -->
			<section class="Feautes section">
			<div class="container">
				<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
					<h2>We Help Emerging Brands Compete & Grow Globally</h2>
					<img src="{{ asset('img/section-img.png') }}" alt="#">
					<p>At BRNDS, we empower SMEs to lead with strong branding, smart Ecommerce strategies, and future-ready technology adoption.</p>
					</div>
				</div>
				</div>
				<div class="row">
				<!-- Branding Expertise -->
				<div class="col-lg-4 col-12">
					<div class="single-features">
					<div class="signle-icon">
						<i class="fa fa-diamond"></i>
					</div>
					<h3>Brand Building</h3>
					<p>We craft meaningful brand narratives and identities that stand out in competitive and evolving global markets.</p>
					</div>
				</div>

				<!-- Ecommerce Enablement -->
				<div class="col-lg-4 col-12">
					<div class="single-features">
					<div class="signle-icon">
						<i class="fa fa-shopping-bag"></i>
					</div>
					<h3>Ecommerce Strategy</h3>
					<p>From storefront setup to conversion optimization, we put Ecommerce at the heart of your business growth.</p>
					</div>
				</div>

				<!-- Technology + AI Integration -->
				<div class="col-lg-4 col-12">
					<div class="single-features last">
					<div class="signle-icon">
						<i class="fa fa-cogs"></i>
					</div>
					<h3>Tech + AI Solutions</h3>
					<p>Our experts help you adopt scalable, AI-enabled technology to improve efficiency, experience, and reach.</p>
					</div>
				</div>
				</div>
			</div>
			</section>
			<!--/ End Features -->

	<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
		<div class="container">
			<div class="row">

			<!-- Brands Transformed -->
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-fun">
				<i class="fa fa-rocket"></i>
				<div class="content">
					<span class="counter">128</span>
					<p>Brands Transformed</p>
				</div>
				</div>
			</div>

			<!-- Ecommerce Projects Delivered -->
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-fun">
				<i class="fa fa-shopping-cart"></i>
				<div class="content">
					<span class="counter">76</span>
					<p>Ecommerce Projects Delivered</p>
				</div>
				</div>
			</div>

			<!-- Global Clients -->
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-fun">
				<i class="fa fa-globe"></i>
				<div class="content">
					<span class="counter">24</span>
					<p>Global Markets Served</p>
				</div>
				</div>
			</div>

			<!-- Years of Collective Experience -->
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-fun">
				<i class="fa fa-users"></i>
				<div class="content">
					<span class="counter">45</span>
					<p>Years of Team Experience</p>
				</div>
				</div>
			</div>

			</div>
		</div>
		</div>
		<!--/ End Fun-facts -->

		

	
		
@endsection