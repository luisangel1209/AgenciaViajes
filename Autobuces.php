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
</head>
<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
	<a href="Inicio.php" class="w3-bar-item w3-blue w3-mobile"><i class="fas fa-bookmark w3-margin-right"></i>Inicio</a>
	<a href="" class="w3-bar-item w3-button w3-mobile">Autobuces</a>
	<a href="../login/CerrarSesion.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Cerrar Sesion</a>
</div>
		<div class="cont1">
			<div class="cont2">
				<h2 class="text1">Elige uno de nuestros dos autobuces</h2>
			</div>
		</div>
		<a href="Sencillo/ConsultaViajes.php" class="button">Autobus Sencillo</a>
		<a href="Lujo/ConsultaViajes.php" title="Contiene: Baño, Señal Wi-Fi, TV, Aperitivos" class="button">Autobus de Lujo</a>
    <script src="js/waves.js"></script>
    
    <script type="text/javascript">
    Waves.init();
	Waves.attach('.button', ['waves-button', 'waves-float']);
	</script>
</body>
</html>