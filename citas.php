<?php session_start()?>
<!DOCTYPE html>
<p>Holi, paciente</p>
<?php echo implode(', ', $_SESSION['row']); ?>
<p><a href="logout.php">Salir</a>.</p>
<p><a href="Reservar_Cita_PoliclinicaJJBallarino.php">Reservar</a>.</p>
