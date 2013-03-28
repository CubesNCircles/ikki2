<?php
	include('../../vendor/simplehtmldom/simple_html_dom.php');

	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => $_POST['url'],
	    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$page = curl_exec($curl);
	$html = new simple_html_dom();
	$htmlPage = $html->load($page);
	// Close request to clear up some resources
	curl_close($curl);

	foreach ( $htmlPage->find('div[class^=mw-content-ltr]') as $b )
	{
		echo $b->outertext;
	}
?>
<script>
	$('div#mw-content-text a').on('click', function(e) {
		e.preventDefault();
	});

	// TABLE & HEADER
	$('tr:not(:nth-child(2))', 'table.infobox_v2').hide();
	$('table.toc').hide(); // table of content
	$('.homonymie').hide(); // similar articles with the same name
	$('span.editsection').hide(); // wikipedia edit 
	$('ul.gallery').hide(); // photo gallery
	$('ul.gallery').prev().hide();
	$('table.wikitable').hide(); // article table
	$('table.wikitable').prev().hide();
	$('span#coordinates').hide(); // coordonnées sous le titre
	$('.bandeau').hide(); // bandeaux d'annonces pourries
	$('.thumbcaption').hide(); // caption sous les images
	// references & all arround
	$('.references-small').prev().hide();
	$('.references-small').next().hide();
	$('.references-small').next().next().hide();
	$('.references-small').hide();
	$('.references').prev().hide()
	$('.references').hide()
	$('table.noprint').hide();
	// bottom: more useless links
	$('ul.bandeau-portail').prev().hide();
	$('ul.bandeau-portail').hide();

	$('h2, h3', '#info .ui-content').on('click', function(){
		$('.active').nextUntil('h2, h3').slideUp();
		$('.active').not($(this)).removeClass('active');
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			$(this).nextUntil('h2, h3').slideDown();
		}else{
			$(this).nextUntil('h2, h3').slideUp();
		}
	});
	
	

</script>
