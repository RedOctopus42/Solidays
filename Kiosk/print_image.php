

<?php
define("imageDirectory", 'InputPhoto/');
define("imageDirectory_b", 'InputForTrt/');
define("imageDirectory_stats", 'stats_print/');



if(isset($_GET['src']))
{
	$filename = basename($_GET['src']);
	$src = $_GET['src'];
	$dst = imageDirectory.$filename;
	echo $src.'<br />';
	echo $filename;
	if (file_exists($dst))
	{
		echo 'le fichier A existe';
	}
	else
	{
		echo 'le fichier A est en création';
		copy($src, $dst);
		$src_b = $dst;
		$filename = basename($dst);
		$dst_b = imageDirectory_b.$filename;
		if (file_exists($dst_b))
		{
			echo 'le fichier B existe';
		}
		else
		{
			echo 'le fichier B est en création';
			copy($src_b, $dst_b);
			creaxml_stat($src);
		}
	}
}
else
{
	echo 'src=vide';
}

function creaxml_stat($src){
	$filename = basename($_GET['src']);
	$xml    = '<?xml version="1.0" encoding="utf-8"?>';
	$xml    .= '<data>';

	$xml .= '<contenu>';
	$xml .= '<typeofcontenu>E_CONTENU_INSTAGRAM</typeofcontenu>';
	$xml .= '<filename>'.$filename.'</filename>';
	$xml .= '<nbprinted> 1 </nbprinted>';
	$xml .= '<orientation>E_UNKNOW</orientation>';
	$xml .= '<prototype>E_UNKNOW</prototype>';
	$xml .= '</contenu>';
	$xml .= '</data>';
						
	$name = $filename;
	$ext = '.xml';
	$img = $name.$ext;
	$destination = imageDirectory_stats.$img;
	$final = nl2br($xml);
	file_put_contents($destination, $final);
}

?>