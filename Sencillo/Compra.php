<?php
include ("../login/panel.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agencia de Viajes</title>
	<link rel="stylesheet" type="text/css" href="../css/estilosinicio.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/popup.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
	<a href="../Inicio.php" class="w3-bar-item w3-blue w3-mobile"><i class="fas fa-bookmark w3-margin-right"></i>Inicio</a>
	<a href="../Autobuces.php" class="w3-bar-item w3-button w3-mobile">Autobuces</a>
	<a href="../login/CerrarSesion.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Cerrar Sesion</a>
</div>
		<!-- <p class="centrado">texto centrado</p> -->
			<?php
            ini_set("soap.wsdl_cache_enabled", "0");
			@$idviaje = $_POST["idviaje"];
			@$idbus = $_POST["idbus"];
			@$iiasiento = $_POST["idasiento"];
			@$nombre = $_POST["nombre"];
			
            $client = new SoapClient("http://18.234.73.61:3131/ws/autobus.wsdl");
            $parametros = array("IDViaje" => $idviaje, "IDAutobus" => $idbus, "IDAsientoSeleccionado" => $iiasiento, "NombrePasajero" => $nombre, "Correo" => $var2);
			$response = $client->__soapCall('SeleccionAsiento', array($parametros));
			if(count((array)$response ) != 0){
				print "<h1>"."IDBoleto: ".$response->{'IDBoleto'}."</h1>";
				echo "<br>";
				print "<h1>"."Salida: ".$response->{'Salida'}."</h1>";
				echo "<br>";
				print "<h1>"."Destino: ".$response->{'Destino'}."</h1>";
				echo "<br>";
				print "<h1>"."Fecha: ".$response->{'Fecha'}."</h1>";
				echo "<br>";
				print "<h1>"."Hora: ".$response->{'Hora'}."</h1>";
				echo "<br>";
				print "<h1>"."IDAutobus: ".$response->{'IDAutobus'}."</h1>";
				echo "<br>";
				print "<h1>"."Asiento: ".$response->{'Asiento'}."</h1>";
				echo "<br>";
				print "<h1>"."Nombre Pasajero: ".$response->{'NombrePasajero'}."</h1>";
				echo "<br>";
				print "<h1>"."Mensaje Confirmacion: ".$response->{'MensajeConfirmacion'}."</h1>";
				//foreach ($response as $key => $value) {
					//print "<p>".$value->{'IDBoleto'}."</p>";
				//}
			}
			?>
		<div class="cont1">
			<div class="cont2">
				<h2 class="text1">Quieres elegir un vuelo?</h2>
			</div>
		</div>
		<a href="../Vuelos/ConsultaViaje.php" class="button">Consulta nuestra linea Aerea</a>
		<a href="" class="button"></a>
		<script src="js/waves.js"></script>
    
    	<script type="text/javascript">
    		Waves.init();
			Waves.attach('.button', ['waves-button', 'waves-float']);
		</script>
</body>
</html>