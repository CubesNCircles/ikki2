<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ikki | Geolocation and Wikipedia</title>
	<meta charset="UTF-8">
	<meta name="keywords" content=""> 
	<meta name="description" content=""> 
	<meta name="robots" content="all"> 
	<meta name="author" content=""> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/jquery.mobile.custom.css">
	<link rel="stylesheet" href="css/jquery.mobile.custom.structure.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>

<!-- The list of interest -->
<div data-role="page" id="list" class="slidehelp">
	<div data-role="header">
			<a href="#" class="settings"></a>
			<a href="#" class="all" id="btnAll">All</a>
			<a href="#" class="showPerLike"></a>
			<a href="#" class="showPerLoca "></a>
	</div>
	<div data-role="content">
		<div id="dropDlist">
			<ul>
				<li>All</li>
				<li class="landmark"><a href="#">Landmark</a> <img src="img/ligne_menuderoulant.png" /></li>
				<li class="places"><a href="#">Places</a><img src="img/ligne_menuderoulant.png" /></li>
				<li class="city"><a href="#">City</a><img src="img/ligne_menuderoulant.png" /></li>
				<li class="history"><a href="#">History</a><img src="img/ligne_menuderoulant.png" /></li>
				<li class="park"><a href="#">Park</a><img src="img/ligne_menuderoulant.png" /></li>
			</ul>
		</div>
	</div>
</div> <!-- End list -->

<!-- The article page -->
<div data-role="page" id="info" class="slidehelp">
	<div data-role="header"><h1 id="quick-title">Ikki | Geolocation and Wikipedia</h1></div>
	<div data-role="content" id="quick-article"></div>
</div> <!-- Article page -->


<div data-role="page" id="explicit" class="slidehelp">
	<div data-role="header"><h1><?php echo'Citadelle de Namur'?></h1></div>
	<div data-role="content"><p>La citadelle de Namur, en Belgique, a de tous temps occupé une position stratégique au cœur de l'Europe. D'abord centre de commandement d'un important comté au Moyen Âge, elle fut ensuite convoitée et assiégée par tous les Grands d'Europe entre le xve siècle et le xixe siècle. À partir de 1891, on la transforma en vaste parc, véritable poumon de verdure surplombant la capitale de la Wallonie2.</p></div>
</div>



<script src="js/cssrefresh.js"></script>
<script src="js/jquery.1.9.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

<p></p>