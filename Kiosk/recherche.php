<!DOCTYPE html>
<head>
	<meta charset='utf-8'>
	<titre>Recherche photos</titre>
<head>
<body>



<form action="../resultats_pics/example10.php" method="GET">
<p>Trouver ma photo: </p>
<p>Avec mon pseudo: <input type="text" name="recherche" /></p>
<p>Avec la date:<select name="choix">
				    <option value="choix1">26/06/2015</option>
				    <option value="choix2">27/06/2015</option>
				    <option value="choix3">28/06/2015</option>
				</select></p>
<p><input type="submit" name="ok" /></p>
</form>

<div class="resultat">
<?php
//include "";
?>
</div>
</body>
</html>