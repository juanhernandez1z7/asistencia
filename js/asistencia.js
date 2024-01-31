$(document).ready(function(){
	$("#div_msg_asistencia").empty();
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

	$("#btn_asistencia").click(function(){
		$("#div_msg_asistencia").empty();
		$("#table_asistencia").empty();
		var asignatura = $("#select_asignatura").val();
		var fecha = $("#txt_fecha").val();

		if(asignatura != '00' && fecha != ''){
			var datos = {'asignatura': asignatura, 'fecha': fecha};
			console.log(datos);
			$.post("php/leer_asistencia.php", datos, function(r){
				r = JSON.parse(r);
				if(r['resp'].length>0 ){
					var text = "";
					var colorFondo;
					for (var i = 0; i < r['resp'].length; i++) {
						if(r['resp'][i]['status'] == "0"){
							colorFondo = "table-danger";
						}else if(r['resp'][i]['status'] == "0.5"){
							colorFondo = "table-warning";
						}else if(r['resp'][i]['status'] == "1"){
							colorFondo = "table-success";
						}
						console.log(colorFondo);
						text += `<tr  class= "${colorFondo}">
									<td class="text-center">${i+1}</td>
									<td class="text-center">${r['resp'][i]['nombre']}</td>
									<td class="text-center">${r['resp'][i]['fecha']}</td>
									<td class="text-center">${r['resp'][i]['hora']}</td>
									<td class="text-center" >${r['resp'][i]['status']}</td>									
								</tr>
						`;
					}

					$("#table_asistencia").append(text);
				}else{
					msg = "Sin resultados";
					msg  = `<div class="col-12 col-lg-6 col-xl-4 d-flex justify-content-center alert alert-danger">${msg}</div>`;

					$("#div_msg_asistencia").append(msg);
				}
			});
			
		}else{
			msg = "Campo vacío";
			msg  = `<div class="col-12 col-lg-6 col-xl-4 d-flex justify-content-center alert alert-danger">${msg}</div>`;

			$("#div_msg_asistencia").append(msg);
		
		}

		
	});
	
});


/*
	Error
	01: vacío
	
	
	*/