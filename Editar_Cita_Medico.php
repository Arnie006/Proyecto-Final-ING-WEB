


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>

    <link rel="stylesheet" href="Editar_Cita_Medico.css">
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
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href=""><font color="#3498DB">Citas Recientes</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
        <section class="nombre_hospital_sistema">
            <div class="nombre_hospital">
                <h3>Editar Citas</h3>
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
        <section class="hora_cita_sistema">
            <div class="hora_cita">
                <p>Horario de Atención:</p>
                <select name="hora" id="horadoctor" method = "post" name="eslahoradelahora" class="selec_hora">
                    <option value = " 07:00:00">7:00 - 7:30</option> 
                    <option value = " 07:30:00">7:30 - 8:00</option> 
                    <option value = " 08:00:00">8:00 - 8:30</option> 
                    <option value = " 08:30:00">8:30 - 9:00</option> 
                    <option value = " 09:00:00">9:00 - 9:30</option> 
                    <option value = " 09:30:00">9:30 - 10:00</option> 
                    <option value = " 10:00:00">10:00 - 10:30</option> 
                    <option value = " 10:30:00">10:30 - 11:00</option> 
                    <option value = " 11:00:00">11:00 - 11:30</option> 
                    <option value = "10">---------------------</option> 
                    <option value = " 13:00:00">13:00 - 13:30</option> 
                    <option value = " 13:30:00">13:30 - 14:00</option> 
                    <option value = " 14:00:00">14:00 - 14:30</option> 
                    <option value = " 14:30:00">14:30 - 15:00</option> 
                    <option value = " 15:00:00">15:00 - 15:30</option> 
                    <option value = " 15:30:00">15:30 - 16:00</option> 
                    <option value = " 16:00:00">16:00 - 16:30</option> 
                    <option value = " 16:30:00">16:30 - 17:00</option> 
                    <option value = " 17:00:00">17:00 - 17:30</option> 
                </select>
            </div>
        </section>    
        
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

        <?php 
//loop que muestra en pantalla la informacion conseguida en el query, y cicla por si hay mas de una linea de informacion
while($row = mysqli_fetch_array($mostrar_citas)){
    //echo $row['id_citas'];
    //echo "<br>";
    //echo $row['fecha'];
    //echo "<br>";
    //echo $row['nombre_medico'];
    ?>

        <section class="cuerpo3">
            <div class="mas-detalles3">
                <hr>
                <p>Centro Médico:</p>
                <p><?php echo $row['nombre_complejos'];?></p>
                <hr>
                <p>Fecha:</p>
                <p><?php echo $row['fecha'];?></p>
                <hr>
                <p>Médico:</p>
                <p><?php echo $row['nombre_medico'];?></p>
                <hr>
                <p>Motivo de Cita:</p>
                <p><?php echo $row['motivo'];?></p>
                <hr>
                <form method="POST" onsubmit="return confirm('Esta seguro que desea eliminar?');">
            
                <input type="hidden" name="_METHOD" value="DELETE">
                <input type="hidden" name="id" value="<?php echo $row['id_citas']; ?>">
                <button class="delet" type="submit">Delete Case</button>
                <hr>
            
            </div>

        </section>

        </form>
        <?php
        
    }
    ?>

        
        <section>
            <div class="ir_atras">
                <img class="botonatras" src="icono_salir.png" alt="">
                <p class="texto_salir">Salir</p>
            </div>
            <div class="boton_enviar">
                <input type= "submit" name="ingresar_cita"  class="btn_enviar">
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>