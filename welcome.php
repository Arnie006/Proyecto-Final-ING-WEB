<?php session_start()?>
<?php
if (isset($_SESSION['username']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<p>Holi, doc</p>
<p><a href="logout.php">Salir</a>.</p>