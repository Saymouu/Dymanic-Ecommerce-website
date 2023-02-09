<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.html">Accueil</a></li>
							<li class="nav-item "><a class="nav-link" href="Produits.php">Produits</a></li>
							<li class="nav-item "><a class="nav-link" href="contact.html">Contact</a></li>
							<li class="nav-item "><a class="nav-link" href="contact.html">Admin</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="Panier.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form  action="Recherche.php" method="get" id="recherche" name="recherche" class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" name="search_input" placeholder="Tapez ici">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
<?php 
if(isset($_POST['new_login'])){
    include("connexpdo.inc.php");
    $idcom= connexpdo("commerce","myparam");

    $username = $_POST['new_login'];  
    $password = $_POST['new_pwd'];  
    
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);   

    $ins = $idcom->prepare("INSERT INTO user (Login, Pass) VALUES(:log,:pass)");
    $ins->bindValue(':log', $username);
    $ins->bindValue(':pass', $password);
    $ins->execute();
    $idcom=null;
    unset($_POST['new_login']);
    if(isset($_POST['new_login']))
        echo'<h3 style="text-align:center;">Compte Crée</h3>';
}    
?>
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Créer un Compte</h3>
						<form class="row login_form" action="" method="post" id="contactForm">
                        <div class="col-md-12 form-group">
								<input type="text" required class="form-control" id="new_login" name="new_login" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" required class="form-control" id="new_pwd" name="new_pwd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-lg-9 form-group">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Créer Compte</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Entrer vos données</h3>
						<form class="row login_form" action="Client.php" method="post" id="loginform">
							<div class="col-md-12 form-group">
								<input type="text" required class="form-control" id="login" name="login" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" required class="form-control" id="pwd" name="pwd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-lg-9 form-group">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Se Connecter</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

		<!-- start footer Area -->
		<footer class="footer-area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-7  col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<h6>Qui Sommes-Nous</h6>
							<p>
								Une Boutique en ligne de chaussures crées par 2 étudiants 
								en 2éme année Génie Logicielle en ENIT, dans le cadre de Miniprojet
								de développement web, Oussema Ammar et Slim Njah.
							</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<h6>Suivez Nous</h6>
							<p>Nos réseaux sociaux:</p>
							<div class="footer-social d-flex align-items-center">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->
	
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		 crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<!--gmaps Js-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
		<script src="js/gmaps.min.js"></script>
		<script src="js/main.js"></script>
	</body>
	
	</html>