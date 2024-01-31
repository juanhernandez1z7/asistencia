$(document).ready(function(){
	$("#div_msg").empty();	
	$.get("php/leer_asignatura.php", function(resp){
		var resp = JSON.parse(resp);
		//console.log(resp);

		var text = ``;
		for (var i = 0; i < resp.length; i++) {
			text += `
				<option value ="${resp[i]['id_asignatura']}">${resp[i]['nombre_asignatura']}</option>
			`; 
		}
		


		$("#select_asignatura").append(text);
	});
	$("#btn_enviar").click(function(){
		$("#div_msg").empty();
		var error = "";
		var txt_ncuenta = $("#txt_ncuenta").val();
		var s_asignatura = $("#select_asignatura").val();
			
		if((txt_ncuenta != "" || txt_ncuenta.length > 0) && s_asignatura != "00"){
			var datos = {
							'ncuenta': txt_ncuenta,
							'asignatura': s_asignatura	
						};
			$.post("php/generarQR.php", datos, function(r){
				var r =  JSON.parse(r);
				//console.log(r);
				if(r['resp']){
					var datos = r['datos'];	
					//console.log(datos);
					location.href = `php/QR/codigoQR.php?nCuenta=${txt_ncuenta}&asignatura=${s_asignatura}&nombre=${datos['nombre']}&nombre_asignatura=${datos['asignatura']}`;
				}else{
					$("#div_msg").empty();
					var msg  = `<div class="col-12 col-lg-6 col-xl-4 d-flex justify-content-center alert alert-danger">No se encuentra inscrito en la asignatura</div>`;
					$("#div_msg").append(msg);

				}
			});
			
		}else{
			error += "01 \n";
			console.log("Errores: " + error);
		}
	});
});


/*
	Error
	01: vacío
	
	
	*/