<?php
include ("../login/panel.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agencia de Viajes</title>
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
       <div id="popup" class="overlay">
            <div id="popupBody">
                <h2>Realizar Compra</h2>
                <a id="cerrar" href="#">&times;</a>
                <div class="popupContent">
    <form action="Compra.php" target="" method="post" name="form">

	<label for="idviaje">ID Viaje</label>
	<input type="text" name="idviaje" id="idviaje" value="<?php echo $_GET['avion'];?>"/>

	<label for="idasiento">ID Asiento</label>
	<input type="text" name="idasiento" id="idasiento"/>
	
	<label for="nombre">Nombre Pasajero</label>
    <input type ="text" name="nombre" id="nombre"/>
    
    <label for="idasiento" >Cliente</label>
	<input type ="text" name="cliente" id="cliente" value="<?php echo $var; ?>"/>
	
	<input type="submit" name="enviar" value="Comprar"/>
</form>
                </div>
              </div>
    </div>
        <table>
			<thead>
				<tr>
					<th>ID Asiento</th>
                    <th>Elegir</th>
				</tr>
			</thead>
			<?php
			error_reporting(E_ALL ^ E_NOTICE);
            ini_set("soap.wsdl_cache_enabled", "0");
            @$Se = "Seleccionar";
			@$idbus = $_GET['avion'];
            @$b = "#popup";
            $client = new SoapClient("http://3.83.221.54:8085/aerolinea.wsdl");
            $parametros = array("idViaje" => $idbus);
            $response = $client->__soapCall('SeleccionarViaje', array($parametros));
            $var = array_values($response->{'asiento'});
            foreach ($var as $key => $value) {  
            print "<tr>";
            print "<td>".$value->{'idAsiento'}."</td>";
                //if("".$value->{'Estatus'}."" == "Ocupado"){
                    //print "<td>".$value->{'Estatus'}."</td>";
                    //print "<td></td>";
                //}else{
                    //print "<td>".$value->{'Estatus'}."</td>";
                    print "<td><a href=".$b.">".$Se."</a></td>"; 
                //}
            print "</tr>";
            }
            ?>
		</table>
</body>
</html>