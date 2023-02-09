<?php
    session_start();
    include("connexpdo.inc.php");
    $idcom= connexpdo("commerce","myparam");

    if(isset($_POST['Article'])) {
        $id=$_POST['Article'];
        $requete="SELECT * FROM article WHERE id_article=$id";
	    $result=$idcom->query($requete);
        $article=$result->fetch(PDO::FETCH_NUM);
        $cartArray = array($article[0],$article[1],$article[2],$article[3]);

        if(empty($_SESSION["panier"])) {
            $_SESSION["panier"] =array();
            array_push($_SESSION["panier"],$cartArray);
        }
        else{
            array_push($_SESSION["panier"],$cartArray);
        }
    }
?>

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
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
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
							<li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
							<li class="nav-item active"><a class="nav-link" href="Produits.php">Produits</a></li>
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
					<h1>Nos Produits</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Produits</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

    <!-- Start Products Area -->
    <section>
    <div class="container">
        <div class="section-top-border">
            <div style="height: 100px;"></div>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#Id</div>
                        <div class="country">Designation</div>
                        <div class="visit">Prix</div>
                        <div class="percentage">Categorie</div>
                        <div class="visit"></div>
                    </div>

<?php

        $requete="SELECT * FROM article";
        $result=$idcom->query($requete);
        if($result->rowCount()>0){
            while ($row = $result->fetch(PDO::FETCH_NUM))
            {
            echo '<div class="table-row">
                    <div class="serial">',$row[0],'</div>
                    <div class="country">',$row[1],'</div>
                    <div class="visit">',$row[2],'.00 $</div>
                    <div class="percentage">
                        <div class="visit">',$row[3],'</div>
                    </div>
                    <div class="visit">
                        <form method="post" class="row contact_form">
                        <input id="Article" name="Article" type="hidden" value="',$row[0],'">
                        <button type="submit" value="Envoyer" style="margin:0px" class="primary-btn small">Ajouter Au Panier</button>
                        </form>
                    </div>
            </div>';
            }
        }
        else{
            echo '  <div class="container">
                        <h2> Aucune resultat.</h2>
                        <button style="margin: 50px;" onclick="window.location.href = \'index.html\';" class="primary-btn">Retour Au Accueil</button>
                    </div>';
        }
?>
                    
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- End Products Area !-->

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
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>