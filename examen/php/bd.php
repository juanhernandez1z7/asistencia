<?php
	$url = "localhost";
	$usuario = "root";
	$pswd = "";
	$bd = "examen";
	$mysqli = new mysqli($url, $usuario, $pswd, $bd);
	$mysqli->set_charset('utf8');
	$conexion = false;
	if($mysqli != false){
		$conexion = true;
	}

	$respuesta = ['bd' => $conexion];

	//echo json_encode($respuesta);



?>