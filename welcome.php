<?php
if (isset($_SESSION['username']) /* or something like that */)
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