<?php
session_start();
include "config.php";
if (!isset($_SESSION['nombre_user']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>

    <link rel="stylesheet" href="Inicio_Doctor.css">
    <link rel="shortcut icon" href="logo_css.png" type="image/x-icon">
</head>

<body>

    <header>
        <nav>

            <!--logo-->
            <div>
            <a href=""><img class="logo" src="circulo_fondo_logo_css.png" alt="Spoilers"></a>
            <!--menu-->
            </div>
            <ul>
                <h1 class="det">Sistema Electrónico de Citas</h1>
                <a href="LoginorSignin.html"><img class="user" src="usuario.png" alt=""></a>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']); ?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="">Citas Recientes</a></h3>
                <h3><a class="btn_reservarcitahover" href="pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
        <section class="nombre_hospital_sistema">
            <div class="nombre_hospital">
                <h3>Ver Citas Recientes</h3>
            </div>
        </section>
    <form method = "post" action="Reservar_Cita_PoliclinicaJJVallarino.php">
        
        <section class="menu_fecha_sistema">
            <div class="menu_fecha">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha"
                    value="<?php echo $fecha; ?>"
                    min="2021-08-12" max="2022-08-12">
            </div>
        </section>
        
        
    </form>





        
        <section >
            <div class="ir_atras">
            <a href='logout.php'> <img class="botonatras" src="icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
            <div class="boton_enviar">
            <input type= "submit" name="ingresar_cita"  class="btn_enviar">
            </div>
            <div class="boton_ver">
                <input type= "submit" name="ver_todo"  class="btn_ver">
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>