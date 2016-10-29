<?php 
                        $urlphoto = "http://localhost/Kiosk/InputImage/";
                        $dir_nom = "InputImage/";
                        $dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); 
                        $fichier= array(); 



                        while($element = readdir($dir)) {

                                if($element != '.' && $element != '..') {
                                   
                                    if (!is_dir($dir_nom.'/'.$element)) {
                                        $fichier[] = $element;
                                    }
                                }
                        }

                        closedir($dir);


                        echo '<ul id="lastimg">';
                        if(!empty($fichier)) 
                        {
                            rsort($fichier);
                                      
                                        
                                        
                            foreach($fichier as $lien) {
                                
                                if(substr($lien, 16, 9 ) === "Instagram")
                                {
                                    if ($lien != "." AND $lien != ".." AND (stristr($lien,'.gif') OR stristr($lien,'.jpg') OR stristr($lien,'.png') OR stristr($lien,'.bmp'))) 
                                    {  
                                         
                                        $h_vign = "240";  
                                        $taille = getimagesize($dir_nom."/".$lien);  
                                        $reduc  = floor(($h_vign*100)/($taille[1]));  
                                        $l_vign = floor(($taille[0]*$reduc)/2);  
                                          echo '<li>';
                                          echo '<a href="', $urlphoto, '/',$lien, '" rel="lightbox">';
                                          echo '<img src="', $urlphoto, '/',$lien, '" > ';  
                                           
                                          echo '</a>'; 
                                          echo '</li>'; 
                                            
                                    }
                                } 
                            } 
                        }echo '</ul>';


                        ?>

<script type="text/javascript" src="js/jquery.gridrotator.js"></script>
<script type="text/javascript"> 
            $(function() {
            
                $( '#ri-grid' ).gridrotator( {
                    rows : 7,
                    columns : 5,
                    maxStep : 3,
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
                    nochange : [0,1,2,3,4,5,6,7,8,9],
                    preventClick : false
                } );
            
            });
        </script>








