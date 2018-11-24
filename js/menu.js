$(function(){

	// Efecto Del Header
		var header = document.getElementById("header");
		var headroom = new Headroom(header);
		headroom.init();

	// Menu Responsive
		// Calculando el ancho de la pantalla
			var ancho = $(window).width(),
				enlaces = $("#enlaces"),
				btnMenu = $("#btn-menu"),
				icono = $("#btn-menu .icono");

			if (ancho < 1240){
				enlaces.hide();
				icono.addClass("fa-bars");
			}

		// El boton del menu 
			btnMenu.on("click", function(e){
				enlaces.slideToggle();

				// Le ponemos la cruz de cerrar
					icono.toggleClass("fa-bars");
					icono.toggleClass("fa-times");

				e.preventDefault();	
			});

		// Resolvemos el problema del cambio de pantalla
			$(window).on("resize", function(e){
				if ($(this).width() > 1240){
					enlaces.show();
					icono.addClass("fa-times");
					icono.removeClass("fa-bars");
				} else {
					enlaces.hide();
					icono.addClass("fa-bars");
					icono.removeClass("fa-times");
				}
			}); 



});