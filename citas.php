<?php session_start()?>
<!DOCTYPE html>
<p>Holi, doc</p>
<?php echo implode(', ', $_SESSION['row']); ?>
<p><a href="logout.php">Salir</a>.</p>