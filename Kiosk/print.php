<?php
header ("Refresh: 20;URL=kiosk.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Print image</title>
		<link href="print.css" rel="stylesheet" />
		<script src="jquery.min.js"></script>
		<script>
		function modifValues(){
		    var val = $('#progress progress').attr('value');
		    
		    var newVal = val*1+0.25;
		    var txt = Math.floor(newVal)+'%';      
		      
		    $('#progress progress').attr('value',newVal).text(txt);
		    $('#progress strong').html(txt);	
		}
		setInterval(function(){ modifValues(); },40);
		</script>
	</head>

	<body>
		<div id="header">
			<a style="top:35px;left:50px;height:150px;width:150px;position:absolute;" href="kiosk.php"></a>
		</div>
		<div id="container">
			<div id="thx">
				<?php 
				$url = $_GET['src'];
				echo '<img src="'.$url.'" />';
				?>
			</div>
			<?php
			define("imageDirectory", 'InputPhoto/');
			$filename = basename($_GET['src']);
			$dst = imageDirectory.$filename;
			if (file_exists($dst))
			{
				echo '<div id="progress">';
				echo '<h1>Cette photo a déjà été imprimée !!</h1>';
				echo '</div>';
			}
			else
			{
				echo '<div id="progress">';
	    		echo '<h1>Impression de votre photo en cours ...<strong>0%</strong></h1>';
	    		echo '<progress value="5" min="0" max="100"><span></span></progress>';
				echo '</div>';
			}
			?>
			
		<div>
	</body>
</html>