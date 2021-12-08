<?php session_start()?>
<!DOCTYPE html>
<h1>Holi, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h1>
<p><a href="logout.php">Salir</a>.</p>
<a href= "citas.php">Otra ventana</a>