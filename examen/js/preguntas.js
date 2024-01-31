$(document).ready(function(){
	var color_array = [
		'1. ¿Qué es un microcontrolador?',
		'2. ¿Qué es un microprocesador?',
		'3. ¿Cuál es la diferencia entre un microprocesador y un microcontrolador?',
		'4. Mencione tres elementos que componen a un sistema mínimo.',
		'5. Menciona que es pipeline.',
		'6. En máscaras booleanas, se tiene el valor de información 0xAA y en el valor de la máscara 0xF0, que resultado obtengo si aplico una máscara del tipo XNOR. ',
		'7. Menciona dos periféricos del Atmega328p.',
		'8. ¿Cuántas instrucciones tiene el Atmega328P?',
		'9. ¿De qué tamaño son los registros del uC?',
		'10. ¿Cuántos pines tiene el Atmega328p?',
		'11. ¿Qué es una máscara booleana?',
		'12. Explica la instrucción LDI.',
		'13. ¿Qué sucede cuando un registro que aún teniendo su máximo valor se incrementa? ',
		'14. Al utilizar la instrucción LDI, que registros no se pueden utilizar',
		'15. ¿La siguiente instrucción es correcta? LDI R16, 0x00',
		'16. Explica la instrucción OUT',
		'17. Explica la instrucción IN',
		'18. Explica la instrucción SER y CLR',
		'19. Explica la instrucción RJMP ¿qué etiqueta no se debe colocar en Microchip Studio y por qué? ',
		'20. En el uC ATmega328p ¿Cuánto tiempo tarda en ejecutarse una instrucción? Considerando un reloj de 1 MHz',
		'21. ¿Cuál es la dirección inicial del SP? ',
		'22. ¿Qué significa la instrucción STS?  ',
		'23. ¿Qué es el SP?',
		'24. ¿Qué función tiene el Contador de Programa?',
		'25. ¿Qué es la Pila?',
		'26. En una pila ¿Qué significa LIFO?',
		'27. En una pila ¿Qué significa FIFO?',
		'28. ¿Qué es una subrutina?',
		'29. Con qué instrucción se llama a una subrutina, explica el o los operandos que utiliza.',
		'30. ¿Qué función tiene la bandera I del registro SREG?',
		'31. ¿Qué instrucción sirve para regresar de una rutina?',
		'32. ¿Qué instrucción sirve para regresar de una subrutina?',
		'33. ¿Cómo se limpian las banderas cuando ocurre una interrupción?',
		'34. ¿Qué directiva se utiliza para indicar el vector de interrupción?',
		'35. ¿Cuáles son los vectores de interrupción para INT0 e INT1?',
		'36. ¿En qué pines de qué puerto se usan para las interrupciones externas? ',
		'37. En un programa en dónde se realiza un incremento cada vez que hay una interrupción en INT0 sensible al flanco de subida ¿es necesario colocar un retardo?¿Por qué?'
	];	


	$("#btn_siguiente").click(function(){
		$("#txt_pregunta").text("");
		var indice_color = aleatorio(color_array)
		var color_elegido = color_array[indice_color];
		$("#txt_pregunta").text(color_elegido);


		color_array = eliminar_dato(color_array, indice_color);
	});

	$("#btn_sortear").click(function(){
		$("#txt_pregunta").text("");
		var indice_color = aleatorio(color_array)
		var color_elegido = color_array[indice_color];
		$("#txt_pregunta").text(color_elegido);

		
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
