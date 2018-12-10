<?php

//parametre
$filename = "data.txt";
//vérification du json
$data_json = file_get_contents("php://input");
$data = json_decode($data_json);
if (! $data) {
	http_response_code(415);
	exit();	
}
elseif (! $data->temperature || ! $data->humidite) {
	http_response_code(400);
	exit();
}
//ecriture des données
$op = file_put_contents($filename, $data_json) ;
//verification de l'ecriture des données
if (! $op) {
	http_response_code(500);
	exit();
}
?>
