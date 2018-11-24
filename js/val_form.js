(function(){

	formulario = document.getElementById("frm-registrarse");

	// var valor = formulario.getElementsByName("input");
	 
	var validarInputs = function(e){
		var valores =formulario.getElementsByTagName("input");
		for (var i=0; i<valores.length; i++)
		if (valores[i].value == 0){
			 alert("Falta llenar el campo "+ valores[i].name);
			 e.preventDefault()

		}

		// var fruits;
		//  fruits = formulario.getElementsByTagName("input");
		//  //alert(fruits[0]);

		// // for (var i=0; i<valor.length; i++){

		// // }
		// var i;
		// for (i = 0; i < fruits.length; i++) { 
		//    	if (fruits[i].value == null) {
		//    		alert("Falta llenar un campo");
		//    	}
		// }
	
	};
	var validarSelects = function(e){
		var valores = formulario.getElementsByTagName("select");
		for (var i=0; i<valores.length; i++)
		if (valores[i].value == 0){
			 alert("Falta Seleccionar");
			 e.preventDefault()

		}

	}
	var validarContrasenia = function(e){
		var contrasenia = document.getElementById("contra").value

    	var contraseniaRepeat = document.getElementById("contraseniaRepeat").value

    	if (contraseniaRepeat!= contrasenia) {
    		alert("Las contraseñas no coinciden");
    		e.preventDefault()
    	}

	}

		var validar = function(e){
			validarInputs(e);
			validarSelects(e);
			validarContrasenia(e);
		};


	formulario.addEventListener("submit", validar);

}())