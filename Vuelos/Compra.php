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
	<a href="" class="w3-bar-item w3-button w3-mobile">Vuelos</a>
	<a href="../login/CerrarSesion.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Cerrar Sesion</a>
</div>
		<!-- <p class="centrado">texto centrado</p> -->
			<?php
            ini_set("soap.wsdl_cache_enabled", "0");
			@$idviaje = $_POST["idviaje"];
			@$iiasiento = $_POST["idasiento"];
			@$nombre = $_POST["nombre"];
            @$cliente = $_POST["cliente"];
            @$hecho = "Compra Realizada con Exito";
            @$Nohecho = "No se pudo Realizar la Compra";
            $client = new SoapClient("http://3.83.221.54:8085/aerolinea.wsdl");
            $parametros = array("idViaje" => $idviaje, "asiento" => $iiasiento, "pasajero" => $nombre, "Cliente" => $var2);
            $response = $client->__soapCall('SeleccionarAsiento', array($parametros));
            $res = $response->{'Boleto'};
            @$a = json_encode($res);
            //var_dump($response);
            @$obj = json_decode($a, TRUE);
            //print_r($obj);
            if(count((array)$obj ) != 0){
				print "<h1>"."IDBoleto: ".$obj["idBoleto"]."</h1>";
				echo "<br>";
				print "<h1>"."Origen: ".$obj["origen"]."</h1>";
				echo "<br>";
				print "<h1>"."Destino: ".$obj["destino"]."</h1>";
				echo "<br>";
				print "<h1>"."Fecha: ".$obj["fecha"]."</h1>";
				echo "<br>";
				print "<h1>"."Hora: ".$obj["hora"]."</h1>";
				echo "<br>";
				print "<h1>"."Precio: $".$obj["precio"]."</h1>";
				echo "<br>";
				print "<h1>"."Pasajero: ".$obj["pasajero"]."</h1>";
				echo "<br>";
				print "<h1>"."Asiento: ".$obj["asiento"]."</h1>";
				//foreach ($response as $key => $value) {
					//print "<p>".$value->{'IDBoleto'}."</p>";
				//}
			}else{
                if(count((array)$obj ) == 0){
                    print "<h1>".$Nohecho."</h1>";
                }
            }
			?>
		<div class="cont1">
			<div class="cont2">
				<h2 class="text1">Quieres elegir un viaje en Autobus?</h2>
			</div>
		</div>
		<a href="../Autobuces.php" class="button">Consulta nuestra linea por Tierra</a>
		<a href="" class="button"></a>
		<script src="js/waves.js"></script>
    
    	<script type="text/javascript">
    		Waves.init();
			Waves.attach('.button', ['waves-button', 'waves-float']);
		</script>
</body>
</html>
