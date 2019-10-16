<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Theme Made By www.w3schools.com -->
	<title>Bootstrap Theme Company Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		body {
			font: 400 15px Lato, sans-serif;
			line-height: 1.8;
			color: #818181;
		}
		h2 {
			font-size: 24px;
			text-transform: uppercase;
			color: #303030;
			font-weight: 600;
			margin-bottom: 30px;
		}
		h4 {
			font-size: 19px;
			line-height: 1.375em;
			color: #303030;
			font-weight: 400;
			margin-bottom: 30px;
		}
		.jumbotron {
			background-color: #f4511e;
			color: #fff;
			padding: 100px 25px;
			font-family: Montserrat, sans-serif;
		}
		.container-fluid {
			padding: 60px 50px;
		}
		.bg-grey {
			background-color: #f6f6f6;
		}
		.logo-small {
			color: #f4511e;
			font-size: 50px;
		}
		.logo {
			color: #f4511e;
			font-size: 200px;
		}
		.thumbnail {
			padding: 0 0 15px 0;
			border: none;
			border-radius: 0;
		}
		.thumbnail img {
			width: 100%;
			height: 100%;
			margin-bottom: 10px;
		}
		.carousel-control.right, .carousel-control.left {
			background-image: none;
			color: #f4511e;
		}
		.carousel-indicators li {
			border-color: #f4511e;
		}
		.carousel-indicators li.active {
			background-color: #f4511e;
		}
		.item h4 {
			font-size: 19px;
			line-height: 1.375em;
			font-weight: 400;
			font-style: italic;
			margin: 70px 0;
		}
		.item span {
			font-style: normal;
		}
		.panel {
			border: 1px solid #f4511e;
			border-radius:0 !important;
			transition: box-shadow 0.5s;
		}
		.panel:hover {
			box-shadow: 5px 0px 40px rgba(0,0,0, .2);
		}
		.panel-footer .btn:hover {
			border: 1px solid #f4511e;
			background-color: #fff !important;
			color: #f4511e;
		}
		.panel-heading {
			color: #fff !important;
			background-color: #f4511e !important;
			padding: 25px;
			border-bottom: 1px solid transparent;
			border-top-left-radius: 0px;
			border-top-right-radius: 0px;
			border-bottom-left-radius: 0px;
			border-bottom-right-radius: 0px;
		}
		.panel-footer {
			background-color: white !important;
		}
		.panel-footer h3 {
			font-size: 32px;
		}
		.panel-footer h4 {
			color: #aaa;
			font-size: 14px;
		}
		.panel-footer .btn {
			margin: 15px 0;
			background-color: #f4511e;
			color: #fff;
		}
		.navbar {
			margin-bottom: 0;
			background-color: #f4511e;
			z-index: 9999;
			border: 0;
			font-size: 12px !important;
			line-height: 1.42857143 !important;
			letter-spacing: 4px;
			border-radius: 0;
			font-family: Montserrat, sans-serif;
		}
		.navbar li a, .navbar .navbar-brand {
			color: #fff !important;
		}
		.navbar-nav li a:hover, .navbar-nav li.active a {
			color: #f4511e !important;
			background-color: #fff !important;
		}
		.navbar-default .navbar-toggle {
			border-color: transparent;
			color: #fff !important;
		}
		footer .glyphicon {
			font-size: 20px;
			margin-bottom: 20px;
			color: #f4511e;
		}
		.slideanim {visibility:hidden;}
		.slide {
			animation-name: slide;
			-webkit-animation-name: slide;
			animation-duration: 1s;
			-webkit-animation-duration: 1s;
			visibility: visible;
		}
		@keyframes slide {
			0% {
				opacity: 0;
				transform: translateY(70%);
			}
			100% {
				opacity: 1;
				transform: translateY(0%);
			}
		}
		@-webkit-keyframes slide {
			0% {
				opacity: 0;
				-webkit-transform: translateY(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateY(0%);
			}
		}
		@media screen and (max-width: 768px) {
			.col-sm-4 {
				text-align: center;
				margin: 25px 0;
			}
			.btn-lg {
				width: 100%;
				margin-bottom: 35px;
			}
		}
		@media screen and (max-width: 480px) {
			.logo {
				font-size: 150px;
			}
		}
	</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home">HOME</a></li>
				<li><a href="#about">ABOUT US</a></li>
				<li><a href="#portfolio">PORTFOLIO</a></li>
				<li><a href="#contact">CONTACT</a></li>
			</ul>
		</div>
	</div>
</nav>

<div id="home">
	<div class="jumbotron text-center">
		<h1>Venue Booking System</h1>
		<p>Be a guest at your own event</p>
	</div>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
	<div class="container-fluid bg-grey">
		<div class="row">
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-globe logo slideanim"></span>
			</div>
			<div class="col-sm-8">
				<h2>About Our Company</h2><br>
				<h4>Whether you're organizing a corporate event or a private party, Venuu has a wide
					selection of amazing event spaces with pictures and all the information you need.
					Use the search function to find the perfect place for you. In addition to regular
					settings, we have many unconventional venues to make your day truly unique!</h4><br>
				<p>The Student Services Department (SSD) contributes towards the holistic development
					of all IICS students and creates a condusive environment  for personal growth.
					SSD offers a range of administrative, welfare and support services to all students.
					The on-going support enables students to focus on academic learning and personal growth.
					Students are encouraged to approach any SSD staff for further assistance.</p>
			</div>
		</div>
	</div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
	<h2>Portfolio</h2>
	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
			</div>
			<div class="item">
				<h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
			</div>
			<div class="item">
				<h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
	<h2 class="text-center">CONTACT</h2>
	<div class="row">

		<div class="slideanim">

			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
				</div>
				<div class="col-sm-6 form-group">
					<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
				</div>
			</div>

			<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
			<div class="row">
				<div class="col-sm-12 form-group">
					<button class="btn btn- pull-right" type="submit">Send</button>
				</div>
			</div>

		</div>

	</div>
</div>

<footer class="container-fluid text-center">
	<a href="#myPage" title="To Top">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</a>
</footer>

<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>

</body>
</html>
