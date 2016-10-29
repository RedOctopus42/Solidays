

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/total.css" />
        <script src="lightbox/js/jquery-1.11.0.min.js"></script>
        <script src="lightbox/js/lightbox.js"></script>
        <script>
        window.onload = function() 
        {
            var body = document.body;
            body.onmousemove = body.onclick = body.onscroll = /* etc */ (function() {
            var reload = function() {
                window.location.replace('../Kiosk/kiosk.php');
            },
            timeout = window.setTimeout(reload, 20000);
            return function() {
                window.clearTimeout(timeout);
                timeout = window.setTimeout(reload, 20000);
                };
            })();
        };
        </script>
        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
</head>
<body>
	<div id="header">
			<a style="top:35px;left:50px;height:150px;width:150px;position:absolute;" href="kiosk.php"></a>
		</div>
    <div id="content">
        <div id="images">
<?php
$nbParPage = 80;
$pageActuel = isset($_GET['pages']) ? $_GET['pages'] : 1;
$num_page= intval($_GET['pages']);
 
 
$current_dir = "InputImage/";
$scandir = scandir($current_dir);
$photos = array();

foreach($scandir as $file) {
                            
    if(substr($file, 16, 9 ) === "Instagram")
    {
        rsort($file);
        if(in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif' , 'JPG','JPEG','PNG','GIF',))) {
        $photos[] = $file;
        }
    }
}
$nbDePhotos = count($photos);
$nbDePages = ceil(count($photos) / $nbParPage);
 

//echo substr($file, 16, 9 ).'<br />';
// On affiche les photos
$minPhoto = ($pageActuel - 1) * $nbParPage;
$maxPhoto = $pageActuel * $nbParPage - 1;
$urlphoto = "http://localhost/Kiosk/InputImage/"; 
for($nPhoto = $minPhoto; $nPhoto <= $maxPhoto; $nPhoto++) {
    rsort($photos);
    if(isset($photos[$nPhoto])){
        echo '<li>
            <a href="'.$urlphoto.$photos[$nPhoto].'" rel="lightbox" ><img src="'.$current_dir.$photos[$nPhoto].'"  class="preview" /></a>
            </li>
                    ';
       
    }
} ?>
</div>
<div id="pagination">
<?php
echo 'Page : ';
for($page = 1; $page <= $nbDePages; $page++) {
    if($page == $num_page)
        echo '<span >'.$page.'</span> ';
    else
        echo '<a id="page" href="total_images.php?pages='.$page.'"  >'.$page.'</a> ';
}
echo '<br /><br />';
$suiv = $num_page + 1; 
$prec = $num_page - 1;  

if ($nbDePages > 1 && $num_page < $nbDePages && $num_page > 1)    
{
	echo ' <a href="total_images.php?pages='.$prec.'"><img src="images/suivante.png"></a> ';
}
    if($num_page == $nbDePages) 
    {
      echo ' <a href="total_images.php?pages='.$prec.'"><img src="images/suivante.png"></a> ';  
         
    } 
if ($nbDePages > 1 && $num_page < $nbDePages) 
{
	echo ' <a href="total_images.php?pages='.$suiv.'"><img src="images/precedente.png"></a> '; 
} 
    else
    {
             
    }
  

 


?>
</div>
<div id="rDate">
<a href="index.php"> <img class="img_kiosk" src ="images/pseudo.png" /></a>
</div>
</div>
</body>
</html>
