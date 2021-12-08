<?php 
session_start();

include "config.php";

$username = "";
$nombre   = "";
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