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
		<center>
       <form method="POST" href="" width="100" height="200">
       Selecciona tu Salida:
       <select name="Salida">
            <option value="Veracruz">Veracruz</option> 
            <option value="Ciudad de Mexico">Ciudad de Mexico</option> 
            <option value="Monterrey">Monterrey</option>
        </select>
        Selecciona tu Destino:
        <select name="Destino">
            <option value="Ciudad de Mexico">Ciudad de Mexico</option> 
            <option value="Chiapas">Chiapas</option>
            <option value="Tijuana">Tijuana</option>
        </select>
            Ingresa la Fecha del Viaje: <input type="text" placeholder="DD-MM-AAAA" name="Fecha">
        <input type="submit" value="Consultar Viaje">
        <a><?php @$fecha = $_POST["Fecha"]; ?></a>
        </form>
        </center>
        <table id="tabla">
			<thead>
				<tr>
					<th>ID Autobus</th>
					<th>Hora</th>
					<th>Precio</th>
					<th>Elige</th>
				</tr>
			</thead>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            ini_set("soap.wsdl_cache_enabled", "0");
            @$host= $_SERVER["HTTP_HOST"];
            @$url= $_SERVER["REQUEST_URI"];
            @$us= "http://" . $host . "/Agencia%20de%20Viajes/Sencillo/Asientos.php?bus=";
            @$Se = "Seleccionar";
            @$no = "No se encontraron viajes";
            @$salida = $_POST["Salida"];
            @$destino = $_POST["Destino"];
            @$fecha = $_POST["Fecha"];
            if(isset($_POST["Salida"]) && isset($_POST["Destino"]) && isset($_POST["Fecha"])){
            $client = new SoapClient("http://18.234.73.61:3131/ws/autobus.wsdl");
            $parametros = array("Salida" => $salida, "Destino" => $destino, "Fecha" => $fecha);
            $response = $client->__soapCall('ConsultarViaje', array($parametros));
            $res = $response->{'Viaje'};
            @$a = json_encode($res);
            //print_r($a);
            @$obj = json_decode($a, TRUE);
            //print_r($obj);
            if(count((array)$obj ) != 5 && count((array)$obj ) != 0){
                foreach ($obj as $key => $value) {
                    print "<tr>";
                    print "<td>".$value["IDAutobus"]."</td>";
                    print "<td>".$value["Hora"]."</td>";
                    print "<td>".$value["Precio"]."</td>";
                    print "<td><a href=".$us.$value["IDAutobus"]."&viaje=".$value["IDViaje"].">".$Se."</a></td>";
                    print "</tr>";
                }
            }else{
                if(count((array)$obj ) == 5){
                    //print_r(count((array)$response ));
                    //print_r($a);
                    foreach ($response as $key => $value) {
                        print "<tr>";
                        print "<td>".$value->IDAutobus."</td>";
                        print "<td>".$value->Hora."</td>";
                        print "<td>".$value->Precio."</td>";
                        print "<td><a href=".$us.$value->IDAutobus."&viaje=".$value->IDViaje.">".$Se."</a></td>";
                        print "</tr>";
                    }
                }else{
                    if(count((array)$obj ) == 0){
                        print "<tr>";
                        print "<td>".$no."</td>"; 
                    }
                }
            }
            }
        ?>
		</table>
           <script>
            document.getElementById("tabla").onclick=function(e){ 
            // obtenemos el elemento sobre el que se ha hecho click
            if(!e)e=window.event; 
            if(!e.target) e.target=e.srcElement; 
            // e.target ahora simboliza la celda en la que hemos hecho click
            // subimos de nivel hasta encontrar un tr
            var TR=e.target;
            while( TR.nodeType==1 && TR.tagName.toUpperCase()!="TR" )
            TR=TR.parentNode;
            var celdas=TR.getElementsByTagName("TD");
            // cogemos la primera celda TD del tr (si existe)
            if( celdas.length!=0 )
            // devolvemos su contenido
            alert( "Esta eligiendo el Viaje " +celdas[0].innerHTML );
            }
    </script>
</body>
</html>