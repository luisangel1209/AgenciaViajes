<?php
include ("login/panel.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agencia de Viajes</title>
	<link rel="stylesheet" type="text/css" href="css/estilosinicio.css">
    <link rel="stylesheet" type="text/css" href="css/popup.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="Sencillo/MisViajes.php" class="w3-bar-item w3-button">Mis Viajes en Autobus Sencillo</a>
  <a href="Lujo/MisViajes.php" class="w3-bar-item w3-button">Mis Viajes en Autobus de Lujo</a>
  <a href="Vuelos/MisViajes.php" class="w3-bar-item w3-button">Mis Viajes en Avion</a>
</div>

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
	<a class="w3-bar-item w3-blue w3-mobile" onclick="w3_open()"><i class="fas fa-bookmark w3-margin-right"></i>Inicio</a>
	<a href="" class="w3-bar-item w3-button w3-mobile">Bienvenido al sistema <?php echo $var; ?></a>
	<a href="login/CerrarSesion.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Cerrar Sesion</a>
</div>

		<div class="cont1">
			<div class="cont2">
				<h2 class="text1">¿Quieres Viajar?</h2>
				<h2 class="text2">Agenda Hoy Mismo</h2>
				<h2 class="text3">Tenemos varios destinos para ti</h2>
			</div>
		</div>
		<a href="Vuelos/ConsultaViaje.php" class="button">Viaja por Aire</a>
		<a href="Autobuces.php" class="button">Viaja por Tierra</a>
		<script src="js/waves.js"></script>
    
    <script type="text/javascript">
    Waves.init();
	Waves.attach('.button', ['waves-button', 'waves-float']);
	</script>
	<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</script>
</body>
</html>