<?php
session_start();
include "config.php";
print_r($_SESSION['correo_user']);
echo $_SESSION['doctor'];
echo $_SESSION['fecha'];