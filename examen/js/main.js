$(document).ready(function(){
	var color_array = ['rojo', 'verde', 'azul', 'amarillo'];
	var numero_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
	var usuario_array = ['Prado González José Leonardo',
'Romero Martinez Giovanni Adan',
'Castro Garcia Ivan',
'Chavez Paniagua Alan Didier',
'Joven Jimenez Angel Cristian',
'Martinez Rios Leonardo Daniel ',
'Rivera Rojas Luis Giovanni',
'Delabra Perez Xiomara Adamari',
'Guerrero Molina  Néstor Alejandro ',
'Solis Ramirez  Eduardo'

	];

	
	

	$("#btn_aleatorio").click(function(){
		$("#txt_usuario").empty();
		$("#txt_color").empty();
		$("#div_img").empty();
		var indice_color = aleatorio(color_array);
		var indice_usuario = aleatorio(usuario_array);
		var indice_numero = aleatorio(numero_array);
		var color_elegido = color_array[indice_color];
		var usuario_elegido = usuario_array[indice_usuario];
		var numero_elegido = numero_array[indice_numero];
		console.log(numero_elegido);
		$("#txt_color").val(color_elegido);
		$("#txt_usuario").val(usuario_elegido);

		dir_img = `examen/img/${color_elegido}/${numero_elegido}.png`;

		txt_img = `<img src="${dir_img}" alt="" class = "col-6">`;
		$("#div_img").append(txt_img);
		
		//color_array = eliminar_dato(color_array, indice_color);
		usuario_array = eliminar_dato(usuario_array, indice_usuario);
	});

	
});

function aleatorio(cadena){
	size_cadena = cadena.length;
	valor_random = Math.floor(Math.random() * size_cadena);
	//console.log(valor_random);
	return valor_random;	
}

function eliminar_dato(cadena, indice){
	
		cadena.splice(indice,1);
		return cadena;
}
