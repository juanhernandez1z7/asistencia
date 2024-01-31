<?php
	include('bd.php');
	date_default_timezone_set("America/Mexico_City");
	$res = false;
	$error = "";
	if($respuesta['bd']){
		$asignatura = $_POST['asignatura'];

		if(isset($asignatura)){
			 echo $query = "SELECT alumno.Nombre, alumno.apellidoP, alumno.apellidoM, alumno.nCuenta, asignatura.nombre_asignatura, asignatura.id_asignatura, asistencia.status, asistencia.hora, asistencia.fecha FROM alumno, inscritos, asignatura, asistencia WHERE alumno.nCuenta = inscritos.id_alumno AND asignatura.id_asignatura = inscritos.id_asignatura AND asignatura.id_asignatura = '$asignatura'";

			$resultados = $mysqli->query($query);
			
			if($resultados->num_rows == 1){
				$datos = [];
				foreach ($resultados as $res ) {
				 	$datos = [
				 		'nombre' => $res['apellidoP'] . " " . $res['apellidoM'] . " ". $res['Nombre'],
				 		'asignatura' => $res['nombre_asignatura'],
				 		'id_asignatura' => $res['id_asignatura'],
				 		'ncuenta' => $res['nCuenta']
				 	];
				 } 

				 $respuesta = [
				 	'resp' => true,
				 	'datos' => $datos
				 ];
				 


			}else{
				$respuesta = ['resp' => false];
			}
		}
		else {
			$error .= "01";
		}

	}
	
	echo json_encode($respuesta);

?>