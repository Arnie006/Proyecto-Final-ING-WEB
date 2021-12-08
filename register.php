<?php 
session_start();

include "config.php";

$username = "";
$nombre   = "";
$apellido = "";
$password = "";
if (isset($_POST['reg_user'])){
    $username =  mysqli_real_escape_string($link,$_POST['username']);
    $nombre = mysqli_real_escape_string($link,$_POST['nombre']);
    $apellido = mysqli_real_escape_string($link,$_POST['apellido']);
    $password = mysqli_real_escape_string($link,$_POST['password']);    


    $user_check_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($link, $user_check_query);
    $user = mysqli_fetch_assoc($result);    
    
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
<a href="pfcontacto.html" style="bottom:0; right:0; right:0; text-align:right; font-size:12px">Contáctenos</a>
<p style="font-size:25px; text-align: center">¡Bienvenido!<br>Por favor llene los campos para registrarse</p><br>
<table align="center">
<tr>
<td>
<form method = "post" action="register.php">
	<label for="nombre">Nombre</label><br>
	<input type="text" name="nombre"  value="<?php echo $nombre; ?>"><br><br>
	<label for="apellido">Apellido</label><br>
	<input type="text" name="apellido"  value="<?php echo $apellido; ?>"><br><br>
	<label for="username">No. de Cédula</label><br>
	<input type="text" name="username" required  value="<?php echo $username; ?>"><br><br>
	<label for="password">Contraseña</label><br>
	<input type="password" name="password" required  value="<?php echo $password; ?>"><br><br>
	<input style="font-size:15px; background-color: transparent; color:#78ffb0; border:none; cursor:pointer; font-weight: bold" type="submit" name="reg_user" value="Registrarse">
</form>
</td>
</tr>
</table><br><br>
<a href="login.php" style="bottom:0; left:0; right:0; text-align:left; font-size:12px">Regresar</a>
</body>
</html>