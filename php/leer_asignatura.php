<?php
	include("bd.php"); 

	if($respuesta['bd']){
		$query = "SELECT * FROM asignatura";
		$resultados = $mysqli->query($query);
		$respuesta = [];
		foreach ($resultados as $res) {
			$respuesta[] = [
				'id_asignatura' => $res['id_asignatura'],
				'nombre_asignatura' => $res['nombre_asignatura']
			]; 
		}

	}

	echo json_encode($respuesta);
?>