<?php
	include('bd.php');
	date_default_timezone_set("America/Mexico_City");
	$res = false;

	if($respuesta['bd']){
		$usuario = $_GET['usuario'];
		$asignatura = $_GET['asignatura'];
		if(isset($usuario) && isset($asignatura)){



			$sql = "SELECT horario_asignatura.hora_inicio, horario_asignatura.hora_final, horario_asignatura.id_asignatura FROM asignatura, horario_asignatura WHERE asignatura.id_asignatura = horario_asignatura.id_asignatura AND horario_asignatura.id_asignatura = '$asignatura'"; 

			$horario = $mysqli->query($sql);
			
			foreach ($horario as $hora) {
				$resultado  = [
					'HI' => $hora['hora_inicio'],
					'HF' => $hora['hora_final'],
					'asignatura' => $hora['id_asignatura']
				];
			}


			//Retardo
			$hora_retardo = strtotime('+16 minute', strtotime($resultado['HI']));
			$hora_retardo =date('H:i:s', $hora_retardo);

			//Asistencia
			$hora_asistencia = strtotime('+11 minute', strtotime($resultado['HI']));
			$hora_asistencia =date('H:i:s', $hora_asistencia);

			////Asistencia
			$hora_falta = strtotime('+21 minute', strtotime($resultado['HI']));
			$hora_falta =date('H:i:s', $hora_falta);

			
			$hora_llegada = (int)date('H')-1;
			$hora_llegada = $hora_llegada.":".date('i:s');
			/*$hora_llegada = "11:40:01";*/


			if($hora_llegada<$hora_retardo){
				$status = "1";
			}elseif ($hora_llegada > $hora_retardo && $hora_llegada<$hora_falta) {
				$status = "0.5";
			}elseif ($hora_llegada>=$hora_falta) {
				$status = "0";
			}

		
			$fecha = date('Y-m-d');
			

			$sql = "INSERT INTO asistencia (nCuenta, fecha, hora, id_asignatura, status) VALUES ('$usuario', '$fecha', '$hora_llegada', '$asignatura', '$status')";
			$res =  $mysqli->query($sql);



			if($res){
				$res = true;
			}
			else{
				$res = false;
			}
		}

	}
	$respuesta = ['res'=> $res];
	echo json_encode($respuesta)

?>