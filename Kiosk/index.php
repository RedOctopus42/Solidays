<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>StackSlider: A Fun 3D Image Slider</title>
		<meta name="description" content="StackSlider: A Fun 3D Image Slider" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="r_pseudo/css/style.css" />
		<script src="r_pseudo/js/modernizr.custom.63321.js"></script>
		<script src="lightbox/js/jquery-1.11.0.min.js"></script>
		<script>
        window.onload = function() 
        {
            var body = document.body;
            body.onmousemove = body.onclick = body.onscroll = body.onkeydown = (function() {
            var reload = function() {
                window.location.replace('kiosk.php');
            },
            timeout = window.setTimeout(reload, 30000);
            return function() {
                window.clearTimeout(timeout);
                timeout = window.setTimeout(reload, 30000);
                };
            })();
        };
        </script>
        <script src="lightbox/js/lightbox.js"></script>
        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
		<!--[if lte IE 7]><style>.support-note .note-ie{display:block;}</style><![endif]-->
	</head>
	<body>
	<div id="header">
			<a style="top:35px;left:50px;height:150px;width:150px;position:absolute;" href="kiosk.php"></a>
		</div>
		<div class="container">	

			<!-- Codrops top bar -->
			
			<section class="main">
				<div id="form">
					
					<form action="" method="GET">
							<p>Votre Pseudo Instagram: <input type="text"  name="pseudo" id="pseudo" />

							<input type="submit" name="ok" value="OK"/></p>
						</form>
				</div>

				<ul id="st-stack" class="st-stack-raw">
					<?php 
                        if ((isset($_GET['pseudo']))&&(!empty($_GET['pseudo']))) {
                                affiche_img_ch($nomRepertoire);
                        }

                        function affiche_img_ch($nomRepertoire)
                        { 
                            // url du fichier qui contient les images  
                            $urlphoto = "http://localhost/Kiosk/InputImage/";  
                            $pseudo = $_GET['pseudo'];
                            // nom du répertoire qui contient les images  
                            $nomRepertoire = "InputImage/"; 
                            //function affiche_img($nomRepertoire){ 
                            if(is_dir($nomRepertoire)) 
                            { 
                                $dossier = opendir($nomRepertoire); 
                                //echo '<ul id="lastimg">';
                                while ($Fichier = readdir($dossier))  
                                { 
                                    $c = similar_text($pseudo, $Fichier, $p);
                                    //echo $p.'_'.$Fichier.'<br />';
                                    if($p >= 20) 
                                    {
                                        if ($Fichier != "." AND $Fichier != ".." AND (stristr($Fichier,'.gif') OR stristr($Fichier,'.jpg') OR stristr($Fichier,'.png') OR stristr($Fichier,'.bmp'))) 
                                        {  
                                            // Hauteur de toutes les images  
                                            $h_vign = "240";  
                                            $taille = getimagesize($nomRepertoire."/".$Fichier);  
                                            $reduc  = floor(($h_vign*100)/($taille[1]));  
                                            $l_vign = floor(($taille[0]*$reduc)/2);  
                                              echo '<li><div class="st-item">';
                                              echo '<a href="', $urlphoto, '/',$Fichier, '" rel="lightbox">';
                                              echo '<img src="', $urlphoto, '/',$Fichier, '"> ';  
                                              //echo "width='$l_vign' height='$h_vign'>";  
                                              echo '</a>'; 
                                              echo '</div></li>'; 
                                                
                                        }
                                        else
                                        {
                                        	echo '<p>Vous n\'avez pas de photo à imprimer </p><br />';
                                        }
                                    }
                                    else
                                    {
                                        
                                        echo $pseudo.'<br />';
                                        
                                    } 
                                } //echo '</ul>';

                               closedir($dossier); 
                            }
                            else
                            { 
                               echo' Le répertoire spécifié n\'existe pas'; 
                            } 
                        }
                        ?>
				</ul>
				
			</section>

		</div><!-- /container -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="r_pseudo/js/jquery.stackslider.js"></script>
		<script type="text/javascript">
			
			$( function() {
				
				$( '#st-stack' ).stackslider();

			});

		</script>
	</body>
</html>