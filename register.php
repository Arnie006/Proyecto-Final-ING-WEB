<?php 
include "config.php";
$username = "";
$nombre   = "";
$password = "";
$apellido = "";
if (isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($link, $_POST['apellido']);
    $password = mysqli_real_escape_string($link, $_POST['password']);    
}

$user_check_query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $user_check_query);
$user = mysqli_fetch_assoc($result);    

if ($user) {
    if ($user['username'] === $username) {
      echo "Usuario existente";
    }else{
        $sql_registro = "insert into users (username, password, nombre, apellido) values ( '$username', '$password', '$nombre', '$apellido');";
        mysqli_query($link, $sql_registro);
        header('location: login.php');
    }
}

?>

<html>
<head>
<meta charset="UTF-8">
<title>Registrarse</title>
<link rel="stylesheet" href="pfestilos.css">
<link rel="icon" href="logo1.png">
</head>
<body>
<h1><img src="logo1.png" width="100" height="100" align="center" style="margin-right: 20px">SISTEMA ELECTRÓNICO DE CITAS</h1><br>
<p style="font-size:25px; text-align: center">¡Bienvenido!<br>Por favor llene los campos para registrarse</p><br>
<table align="center">
<tr>
<td>
<form action="register.php">
	<label for="nreal">Nombre</label><br>
	<input type="text" name="nombre"><br><br>
	<label for="apellido">Apellido</label><br>
	<input type="text" name="apellido"><br><br>
	<label for="nombre">No. de Cédula</label><br>
	<input type="text" name="username" required><br><br>
	<label for="contrasena">Contraseña</label><br>
	<input type="password" name="password" required><br><br>
	<input style="font-size:15px; background-color: transparent; color:#78ffb0; border:none; cursor:pointer; font-weight: bold" type="submit" name="reg_user" value="Registrarse">
</form>
</td>
</tr>
</table><br><br>
<a href="login.html" style="bottom:0; left:0; right:0; text-align:left; font-size:12px">Regresar</a>
</body>
</html>