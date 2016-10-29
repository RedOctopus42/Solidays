<?php
header("Cache-Control: no-cache");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" /> 
        <title>Kiosk Instagram</title> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="lightbox/js/jquery-1.11.0.min.js"></script>
        <script src="lightbox/js/lightbox.js"></script>
        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
        <script src="lightbox/js/jquery-latest.js" > </script>
 
        <script>
        var refreshId = setInterval(function()
        {
            $('#ri-grid').load('recup_images.php').fadeIn("fast");
            $("#lastimg").find("img").show();
        }, 15000);
        </script>

        <noscript>
            <link rel="stylesheet" type="text/css" href="css/fallback.css" />
        </noscript>
        <!--[if lt IE 9]>
            <link rel="stylesheet" type="text/css" href="css/fallback.css" />
        <![endif]-->
    </head>
    <body>
		<div id="header">
			<a style="top:35px;left:50px;height:150px;width:150px;position:absolute;" href="kiosk.php"></a>
		</div>
        <div class="container" > 
            <section class="main" id="test">
                <div id="ri-grid" class="ri-grid ri-grid-size-3 ri-shadow">
                    <img class="ri-loading-image" src="images/loading.gif"/>
                    <?php include 'recup_images.php'; ?>
                </div>
                
                <a href="total_images.php"> <img class="img_suivant" src ="images/lien_suivant.png" /></a>
            </section>
        </div>
        
    </body>
</html>