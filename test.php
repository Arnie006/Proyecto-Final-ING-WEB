<?php
session_start();
include "config.php";
$doctor = "";
if (isset($_POST['boton'])){

$doctor = mysqli_real_escape_string($link,$_POST['doctor']);
$_SESSION['doctor'] = $doctor ?? "";
header('location: test2.php');
}

?>


<html>
    <form action="test.php" method="post">
        <select id="doctor" name="doctor">
            <option value="1">doctor 1</option>
            <option value="2">doctor 2</option>

        </select>
        <input type="submit" name="boton">
    </form>
