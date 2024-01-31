<?php
	include("bd.php"); 

	if($respuesta['bd']){
		$query = "SELECT alumno.nombre, alumno.apellidoP, alumno.apellidoM, asistencia.id_asistencia, asistencia.fecha, asistencia.hora FROM asistencia, alumno  WHERE alumno.id_alumno = asistencia.id_alumno ORDER BY alumno.apellidoP";
		$resultados = $mysqli->query($query);
		$respuesta = [];
		foreach ($resultados as $res) {
			$respuesta[] = [
				'id_asis' => $res['id_asistencia'],
				'nombre_completo' => $res['apellidoP']. " " . $res['apellidoM']. " ". $res['nombre'],
				'hora' => $res['hora'], 
				'fecha' => $res['fecha']
			]; 
		}

	}

	$respuesta = ['res' => $respuesta];
	echo json_encode($respuesta);
?>