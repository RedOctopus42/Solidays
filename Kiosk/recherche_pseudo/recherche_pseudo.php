<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Playful Trampoline Effect | Demo: Default Version</title>
		<meta name="description" content="A content navigation effect that reminds of jumping on a trampoline" />
		<meta name="keywords" content="svg, animation, trampoline, effect, images, navigation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/vicons-font.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="../lightbox/js/jquery-1.11.0.min.js"></script>
		<script>
        window.onload = function() 
        {
            var body = document.body;
            body.onmousemove = body.onclick = body.onscroll = /* etc */ (function() {
            var reload = function() {
                window.location.replace('../kiosk.php');
            },
            timeout = window.setTimeout(reload, 20000);
            return function() {
                window.clearTimeout(timeout);
                timeout = window.setTimeout(reload, 20000);
                };
            })();
        };
        </script>
        <script src="../lightbox/js/lightbox.js"></script>
        <link href="../lightbox/css/lightbox.css" rel="stylesheet" />
		<script src="js/snap.svg-min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="demo-1">
		<div id="morph-shape" class="morph-shape" data-morph-next="M301,301c0,0-83.8-21-151-21C71.8,280-1,301-1,301s21-65.7,21-151C20,79.936-1-1-1-1s73,11,151,11c85,0,151-11,151-11
	s-21,66.43-21,151C280,229.646,301,301,301,301z">
			<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
				<path d="M301,301c0,0-83.8,0-151,0c-78.2,0-151,0-151,0s0-65.7,0-151C-1,79.936-1-1-1-1s73,0,151,0c85,0,151,0,151,0s0,66.43,0,151
C301,229.646,301,301,301,301z" />
			</svg>
		</div>
		<div class="main">
			<div class="container">
				<header class="codrops-header">
					<h1>Recherche par Pseudo</h1>
					<form action="" method="GET">
							<p>Votre Pseudo Instagram: <input type="text"  name="pseudo" id="pseudo" />

							<input type="submit" name="ok" value="OK"/></p>
						</form>
					<div class="codrops-links">
					
					</div>
				</header>
				<div class="stack">
					<ul id="elasticstack" class="stack__images">
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
							$nomRepertoire = "../InputImage/"; 
							//function affiche_img($nomRepertoire){ 
							if(is_dir($nomRepertoire)) 
							{ 
								$dossier = opendir($nomRepertoire); 
								//echo '<ul id="lastimg">';
							  	while ($Fichier = readdir($dossier))  
							    { 
							    	$c = similar_text($pseudo, $Fichier, $p);
							    	//echo $p.'_'.$Fichier.'<br />';
							       	if($p >= 30) 
							       	{
										if ($Fichier != "." AND $Fichier != ".." AND (stristr($Fichier,'.gif') OR stristr($Fichier,'.jpg') OR stristr($Fichier,'.png') OR stristr($Fichier,'.bmp'))) 
							        	{  
									        // Hauteur de toutes les images  
									        $h_vign = "240";  
									        $taille = getimagesize($nomRepertoire."/".$Fichier);  
									        $reduc  = floor(($h_vign*100)/($taille[1]));  
									        $l_vign = floor(($taille[0]*$reduc)/2);  
									       	  echo '<li>';
									          echo '<a href="', $urlphoto, '/',$Fichier, '" rel="lightbox">';
									     	  echo '<img src="', $urlphoto, '/',$Fichier, '"> ';  
									          //echo "width='$l_vign' height='$h_vign'>";  
									          echo '</a>'; 
									          echo '</li>'; 
									            
							          	}
							       	}
							       	else
							       	{
							       		//echo 'Vous n\'avez pas de photo à imprimer <br />';
							       		//echo $pseudo.'<br />';
							       		

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
					<button id="stack-next" class="stack__next"><i class="icon icon-down"></i><span>Next</span></button>
					<ul id="stack-titles" class="stack__titles">
						
							
					</ul>
				</div><!-- /stack -->
			</div><!-- /container -->
		</div><!-- /main-->
		<script src="js/draggabilly.pkgd.min.js"></script>
		<script src="js/elastiStack.js"></script>
		<script>
			(function() {
				var body = document.body,
					titles = [].slice.call( document.querySelectorAll( '#stack-titles > li' ) ),
					totalTitles = titles.length,
					stack = new ElastiStack( document.getElementById( 'elasticstack' ), {
						onUpdateStack : function( idx ) {
							classie.remove( titles[idx === 0 ? totalTitles - 1 : idx - 1], 'current' );
							classie.add( titles[idx], 'current' );
						}
					} ),
					shapeEl = document.getElementById( 'morph-shape' ),
					s = Snap( shapeEl.querySelector( 'svg' ) ),
					pathEl = s.select( 'path' ),
					paths = { 
						reset : pathEl.attr( 'd' ),
						next  : shapeEl.getAttribute( 'data-morph-next' )
					};

				//document.getElementById( 'stack-next' ).addEventListener( 'mousedown', nextItem );
				
				function nextItem() {
					classie.add( body, 'animating' );
					classie.add( body, 'navigate-next' );
					pathEl.stop().animate( { 'path' : paths.next }, 450, mina.easeinout, function() {
						classie.remove( body, 'navigate-next' );
						stack.nextItem( { transform : 'translate3d(0,-60px,400px)' } );
						pathEl.stop().animate( { 'path' : paths.reset }, 100, mina.easeout, function() {
							classie.remove( body, 'animating' );
						} );
					} );
				}
				

			})();
		</script>
	</body>
</html>
