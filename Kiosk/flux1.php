<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
echo "retry: 1000\n"; //Optionnel pour signifier au navigateur de recommencer après x millièmes de secondes
 
function majdateheure($id, $msg) {
  echo "event: majdateheure\n";
  echo 'data: {"id": "'. $id.'", "msg": "' .$msg . '"}';
  echo "\n\n";
  ob_flush();
  flush();
}
 
$serverTime = time(); // un id
$dateheure = date ("- d/m/Y - H:i:s - ");
majdateheure($serverTime, $dateheure);
?>