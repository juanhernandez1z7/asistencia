<?php
	include("bd.php");
	$bd = false;
	if("respuesta['bd']" == true){
		$bd = true;
		
		

	}

	$respuesta = ['bd' => $bd];

	echo json_encode($respuesta);
?>