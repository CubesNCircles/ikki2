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
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<meta name="apple-mobile-web-app-title" content="Ikki">
	<link rel="apple-touch-startup-image" href="assets/img/4/apple-touch-startup-image.png" media="(device-height:480px)">
	<link rel="apple-touch-startup-image" href="assets/img/5/apple-touch-startup-image.png" media="(device-height:568px)">

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
			<a href="#" class="showPerLocaActive"></a>
	</div>
	<div data-role="content">
		<div id="dropDlist">
			<ul>
				<li><a href="#" class="type active" id="all">All</a></li>
				<li><a href="#" class="type" id="landmark">Landmark</a></li>

				<li><a href="#" class="type" id="city">City</a></li>
				<li><a href="#" class="type" id="history">History</a></li>
				<li><a href="#" class="type" id="edu">Academy</a></li>
				<li><a href="#" class="type" id="railwaystation">Railway Station</a></li>
			</ul>
		</div>
		<div id="settings">
			<ul>
				<li><a href="#" class="type active" id="all">All</a></li>
				<li><a href="#" class="type" id="landmark">Landmark</a></li>
				
				<li><a href="#" class="type" id="city">City</a></li>
				<li><a href="#" class="type" id="history">History</a></li>
				<li><a href="#" class="type" id="edu">Academy</a></li>
				<li><a href="#" class="type" id="railwaystation">Railway Station</a></li>
			</ul>
		</div>
	</div>
</div> <!-- End list -->

<!-- The article page -->
<div data-role="page" id="info" class="slidehelp">
	<div data-role="header"> <div href="#" id="back">List</div> <h1 id="quick-title">Ikki | Geolocation and Wikipedia</h1></div>
	<div data-role="content" id="quick-article"></div>
</div> <!-- Article page -->

<script src="js/cssrefresh.js"></script>
<script src="js/jquery.1.9.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>