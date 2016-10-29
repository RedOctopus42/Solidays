				<div id="ri-grid" class="ri-grid ri-grid-size-3 ri-shadow">
					<img class="ri-loading-image" src="images/loading.gif"/>
						<?php 
						
						if ((isset($_GET['choix']))&&(!empty($_GET['choix']))) {
							if ($_GET['choix'] == 'choix1'){
								affiche_img_ch1($nomRepertoire);
							}
						}
						 
						function affiche_img($nomRepertoire){ 
						// nom du répertoire qui contient les images
						$nomRepertoire = "../Sauvegarde/instagram/solidays/"; 
						// url du fichier qui contient les images 
						$urlphoto = "http://www.livepark.fr/coca-cola2015/instagramtweeter/Sauvegarde/instagram/solidays";
						if(is_dir($nomRepertoire)) 
						{ 
							$dossier = opendir($nomRepertoire); 
							echo '<ul>';
						  	while ($Fichier = readdir($dossier))  
						    { 
						       	if(substr($Fichier, 0, 7 ) != "Profile") 
						       	{
									if ($Fichier != "." AND $Fichier != ".." AND (stristr($Fichier,'.gif') OR stristr($Fichier,'.jpg') OR stristr($Fichier,'.png') OR stristr($Fichier,'.bmp'))) 
						        	{  
								        // Hauteur de toutes les images  
								        $h_vign = "240";  
								        $taille = getimagesize($nomRepertoire."/".$Fichier);  
								        $reduc  = floor(($h_vign*100)/($taille[1]));  
								        $l_vign = floor(($taille[0]*$reduc)/2);  
								       	  echo '<li>';
								          echo '<a href="', $urlphoto, '/',$Fichier, '" rel="lightbox" title="coucou">';
								     	  echo '<img src="', $urlphoto, '/',$Fichier, '"> ';  
								          //echo "width='$l_vign' height='$h_vign'>";  
								          echo '</a>'; 
								          echo '</li>'; 
								            
						          	}
						       	} 
						    } echo '</ul>';

						   closedir($dossier); 
						}
						else
						{ 
						   echo' Le répertoire spécifié n\'existe pas'; 
					    }
					    } 

					    function affiche_img_ch1($nomRepertoire){ 
						// nom du répertoire qui contient les images
						$nomRepertoire = "../Sauvegarde/instagram/solidays/"; 
						// url du fichier qui contient les images 
						$urlphoto = "http://www.livepark.fr/coca-cola2015/instagramtweeter/Sauvegarde/instagram/solidays";
						if(is_dir($nomRepertoire)) 
						{ 
							$dossier = opendir($nomRepertoire); 
							echo '<ul>';
						  	while ($Fichier = readdir($dossier))  
						    { 
						    	
						       	if((substr($Fichier, 0, 7 ) != "Profile") && (substr($Fichier, 19, 8) === "12062015")) 
						       	{
						       		//echo substr($Fichier, 19, 8);
									if ($Fichier != "." AND $Fichier != ".." AND (stristr($Fichier,'.gif') OR stristr($Fichier,'.jpg') OR stristr($Fichier,'.png') OR stristr($Fichier,'.bmp'))) 
						        	{  
								        // Hauteur de toutes les images  
								        $h_vign = "240";  
								        $taille = getimagesize($nomRepertoire."/".$Fichier);  
								        $reduc  = floor(($h_vign*100)/($taille[1]));  
								        $l_vign = floor(($taille[0]*$reduc)/2);  
								       	  echo '<li>';
								          echo '<a href="', $urlphoto, '/',$Fichier, '" rel="lightbox" title="coucou">';
								     	  echo '<img src="', $urlphoto, '/',$Fichier, '"> ';  
								          //echo "width='$l_vign' height='$h_vign'>";  
								          echo '</a>'; 
								          echo '</li>'; 
								            
						          	}
						       	} 
						    } echo '</ul>';

						   closedir($dossier); 
						}
						else
						{ 
						   echo' Le répertoire spécifié n\'existe pas'; 
					    }
					    }
						?>
				</div> 
</body>
</html>

