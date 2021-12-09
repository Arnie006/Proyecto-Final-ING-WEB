<?php session_start()?>
<?php
if (!isset($_SESSION['nombre_user']) /* or something like that */)
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<h1>Holi, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h1>
<p><a href="logout.php">Salir</a>.</p>
<a href= "citas.php">Otra ventana</a>
<a href= "citasrecientes.php">eliminar</a>