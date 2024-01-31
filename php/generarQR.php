<?php
	include('bd.php');
	date_default_timezone_set("America/Mexico_City");
	$res = false;
	$error = "";
	if($respuesta['bd']){
		$nCuenta = $_POST['ncuenta'];
		$asignatura = $_POST['asignatura'];

		if(isset($nCuenta) && isset($asignatura)){
			 $query = "SELECT alumno.Nombre, alumno.apellidoP, alumno.apellidoM, alumno.nCuenta, asignatura.nombre_asignatura, asignatura.id_asignatura FROM alumno, inscritos, asignatura WHERE alumno.nCuenta = inscritos.id_alumno AND asignatura.id_asignatura = inscritos.id_asignatura AND alumno.nCuenta = '$nCuenta'  AND asignatura.id_asignatura = '$asignatura'";

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