<?php
	include('bd.php');
	$asignatura_ = $_POST['asignatura'];
	$fecha_ = $_POST['fecha'];	
	$serv = false;
	$bd = false;
	if($respuesta['bd']){
		$bd = true;
		if(isset($asignatura_) && isset($fecha_)){
			$serv = true;
			$sql = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.apellidoM, alumno.correo, asistencia.status, asistencia.hora, asistencia.fecha FROM asistencia, alumno WHERE alumno.nCuenta = asistencia.nCuenta AND asistencia.id_asignatura = '$asignatura_' AND asistencia.fecha = '$fecha_' ORDER BY alumno.ApellidoP";

			$asistencia = $mysqli->query($sql);
			$resultado = [];
			foreach ($asistencia as $asistente) {
				$resultado[]  = [
						'nombre' => $asistente['ApellidoP'] . " ". $asistente['apellidoM']. " " . $asistente['Nombre'],
						'correo' => $asistente['correo'],
						'status' => $asistente['status'],
						'hora' => $asistente['hora'],
						'fecha' => $asistente['fecha']
				];
			}




	}
}

	$respuesta = [
			'bd' => $bd,
			'serv' => $serv,
			'resp' => $resultado
		];



	echo json_encode($respuesta);


?>