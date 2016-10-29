<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Kiosk Instagram</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
		<script src="js/jquery-1.10.2.js"></script>
        <script src="lightbox/js/jquery-1.11.0.min.js"></script>
        <script src="lightbox/js/lightbox.js"></script>
        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery.gridrotator.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					rows : 8,
					columns : 5,
					maxStep : 4,
					interval : 2000,
					w1024 : {
						rows : 5,
						columns : 6
					},
					w768 : {
						rows : 5,
						columns : 5
					},
					w480 : {
						rows : 6,
						columns : 4
					},
					w320 : {
						rows : 7,
						columns : 4
					},
					w240 : {
						rows : 7,
						columns : 3
					},
					preventClick : false
				} );
			
			});
		</script>
        <script>
        var refreshId = setInterval(function()
        {
            $('#ri-grid').fadeOut("fast").load('recup_images.php').fadeIn("fast");
            $("#lastimg").find("img").show();
        }, 10000);
        </script>
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/fallback.css" />
		</noscript>
		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="css/fallback.css" />
		<![endif]-->
    </head>
    <body>
		<div class="container">
			
			<section class="main">

				<div id="ri-grid" class="ri-grid ri-grid-size-3 ri-shadow">
					<img class="ri-loading-image" src="images/loading.gif"/>
					<?php include 'recup_images.php'; ?>
						
				</div> 
				<a href="../resultats_pics/example10.php"> <img class="img_kiosk" src ="images/recherche.png" /></a>
                <a href="total_images.php"> <img class="img_suivant" src ="images/lien_suivant.png" /></a>>
			</section>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
    </body>
</html>