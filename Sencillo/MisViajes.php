<?php
include ("../login/panel.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agencia de Viajes</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/popup.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
	<a href="../Inicio.php" class="w3-bar-item w3-blue w3-mobile"><i class="fas fa-bookmark w3-margin-right"></i>Inicio</a>
	<a href="" class="w3-bar-item w3-button w3-mobile">Mis Viajes Autobus Sencillo</a>
	<a href="../login/CerrarSesion.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Cerrar Sesion</a>
</div>
        <table id="tabla">
			<thead>
				<tr>
					<th>ID Boleto</th>
					<th>ID Viaje</th>
					<th>ID Asiento</th>
				</tr>
            </thead>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            ini_set("soap.wsdl_cache_enabled", "0");
            @$no = "No se encontraron viajes";
            $client = new SoapClient("http://18.234.73.61:3131/ws/autobus.wsdl");
            $parametros = array("NombreIngresadoEnLaCompra" => $var, "CorreoIngresadoEnLaCompra" => $var2);
            $response = $client->__soapCall('MisViajes', array($parametros));
            $res = $response->{'MisViajes'};
            @$a = json_encode($res);
            //print_r($a);
            @$obj = json_decode($a, TRUE);
            //print_r($obj);
            //print_r(count($obj));
            if(count((array)$obj ) != 3){
            foreach ($obj as $key => $value) {
            print "<tr>";
            print "<td>".$value["IDBoleto"]."</td>";
            print "<td>".$value["IDViaje"]."</td>";
            print "<td>".$value["IDAsiento"]."</td>";
            print "</tr>";
            }
            }else{
                if(count((array)$obj ) == 3){
                    //print_r(count((array)$response ));
                    //print_r($a);
                    foreach ($response as $key => $value) {
                        print "<tr>";
                        print "<td>".$value->IDBoleto."</td>";
                        print "<td>".$value->IDViaje."</td>";
                        print "<td>".$value->IDAsiento."</td>";
                        print "</tr>";
                    }
                }else{
                print "<tr>";
                print "<td>".$no."</td>";
                }
            }  
        ?>
		</table>
		</header>
    </script>
</body>
</html>