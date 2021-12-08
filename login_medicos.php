<?php

require_once "config.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    $myusername = mysqli_real_escape_string($link,$_POST['user']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
    
    $sql = "SELECT id FROM medicos WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($link,$sql) or die (mysqli_error($link));
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
      
    if($count == 1) {
        header("location: welcome.php");
    }else {
       $error = "Login Invalido";
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Iniciar sesión</title>
<link rel="stylesheet" href="pfestilos.css">
<link rel="icon" href="logo1.png">
</head>
<body>
<h1 style="text-shadow: 3px 2px #000000"><img src="logo1.png" width="100" height="100" align="center" style="margin-right: 20px">SISTEMA ELECTRÓNICO DE CITAS</h1>
<form style="font-size:11px; margin-top: 60px; text-align: center" action="#" method="POST">
	<label for="nombre">Usuario</label><br>
	<input style="text-align: center" type="text" name="user" required><br><br>
	<label for="contrasena">Contraseña</label><br>
	<input style="text-align: center" type="password" name="password" required><br><br><br>
	<input style="font-size:15px; background-color: transparent; color:#78d9ff; border:none; cursor:pointer; font-weight: bold" type="submit" value="Ingresar">
    <br>Para pacientes: <a href="login.php">Login Pacientes</a>
</form>

</body>
</html>