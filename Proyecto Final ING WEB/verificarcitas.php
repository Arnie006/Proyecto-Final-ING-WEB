<?php
require_once "config.php";
session_start();

//revisa si la sesion esta iniciada y evita que el usuario acceda a las paginas escribiendo el nombre del archivo en la barra
if (isset($_SESSION['username']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['row']['id'];
$sql_show = "select * from (select prueba_citas.id_citas, prueba_citas.fecha, users.nombre, users.apellido, medicos.id, prueba_citas.id_medico from (users inner join prueba_citas on prueba_citas.id_paciente=users.id_users) inner join medicos on medicos.id=prueba_citas.id_medico) as A where id_medico =
".$usuario;
$mostrar_citas = mysqli_query($link, $sql_show) or die( mysqli_error($link));

while($row = mysqli_fetch_array($mostrar_citas)){
    echo $row['id_citas'];
    echo "<br>";
    echo $row['fecha'];
    echo "<br>";
    $nombrecompleto = $row['nombre'] . $row['apellido'];
    echo $nombrecompleto;
    

}
?>