<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Recientes</title>

    <link rel="stylesheet" href="Citas_Recientes_Medico.css">
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
                <a href="#"><img class="user" src="usuario.png" alt=""></a>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="#">Reservar Citas</a></h3>
                <h3><a class="btn_reservarcitahover" href="citasrecientes.php"><font color="#2ECC71">Citas Recientes</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
        <?php echo $doctor?>
    <form method = "post" action="Reservar_Cita_PoliclinicaJJBallarino.php">
        
    
    </form>
        <section class="cuerpo2">
            <div class="mas-detalles2">
                <p>No. de Seguro Social:</p>
                <p><?php echo $_SESSION['cedula'];?></p>
                <hr>
                <p>Correo Electrónico:</p>
                <p><?php echo implode(', ', $_SESSION['correo_user']);?></p>
                <hr>
                <p>Teléfono:</p>
                <p><?php echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
            </div>
        </section>

        <section class="cuerpo3">
            <div class="mas-detalles3">
                <hr>
                <p>Centro Médico:</p>
                <p><?php echo $_SESSION['cedula'];?></p>
                <hr>
                <p>Fecha:</p>
                <p><?php echo implode(', ', $_SESSION['correo_user']);?></p>
                <hr>
                <p>Hora de Atención:</p>
                <p><?php echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
                <p>Médico:</p>
                <p><?php echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
                <p>Motivo de Cita:</p>
                <p><?php echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
            </div>
        </section>


        
        <section>
            <div class="ir_atras">
                <a href="logout.php" ><img class="botonatras" src="icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
            <div class="boton_editar">
                <a href=""><p class="edit">Editar</p></a>
                <a href=""><p class="delet">Eliminar</p></a>
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>