<?php
	// Connection info. file
	include 'ConexionBD.php';
    $conexion = new mysqli($ServerName, $Username, $Password, $NameBD);
    if(!$conexion){
        die("Conexion fallida " . mysqli_connect_error());   
    }		
    // dsddata sent from form login.html 
    @$name = $_POST['Nombre'];
    @$password = $_POST['Contra'];
    @$email = $_POST['Correo']; 
    $buscarUsuario = "SELECT * FROM Clientes WHERE Correo = '$_POST[Correo]' ";
    $result = $conexion->query($buscarUsuario);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        header('Location: Fail.html');
    }else{
        $query = "INSERT INTO Clientes (NumeroCliente,Nombre,Correo,Contra) VALUES (Null,'$name','$email' , '$password')";
        if ($conexion->query($query) === TRUE) {
            header('Location: Success.html');
        }else{
            echo "Error al crear el usuario." . $query . "<br>" . $conexion->error;
        }
    }
    mysqli_close($conexion);  
?>