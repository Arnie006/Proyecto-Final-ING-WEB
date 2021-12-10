<?php
require_once "config.php";
session_start();


//revisa si la sesion esta iniciada y evita que el usuario acceda a las paginas escribiendo el nombre del archivo en la barra
if (isset($_SESSION['username']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
/*select dentro de un select, para poder hacer un join de las tablas que usaremos para mostrar la informacion, 
y luego para el paciente en especifico*/
$usuario = $_SESSION['row']['id_users'];
$sql_show = "select * from (select prueba_citas.id_citas, prueba_citas.fecha, prueba_citas.id_paciente, medicos.nombre_medico, complejos.nombre_complejos, especialidad.nombre_especialidad, prueba_citas.motivo from (((medicos inner join prueba_citas on prueba_citas.id_medico = medicos.id) inner join complejos on medicos.id_complejo=complejos.id) inner join especialidad on medicos.id_especialidad=especialidad.id)) as T where id_paciente = 
".$usuario;
$mostrar_citas = mysqli_query($link, $sql_show);



//query para eliminar toda la informacion de la tabla
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' || ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_METHOD'] == 'DELETE')) {
    $id = (int) $_POST['id'];
    $sql_delete = "delete from prueba_citas where id = ".$id;
    $result = mysqli_query($link, $sql_delete);
    if ($result !== false) {
        header('Location: citasrecientes.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Recientes</title>

    <link rel="stylesheet" href="Citas_Recientes.css">
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
                <h3><a class="btn_reservarcitahover" href="Escoger_Centro_Hospitalario.php">Reservar Citas</a></h3>
                <h3><a class="btn_reservarcitahover" href=""><font color="#2ECC71">Citas Recientes</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
    <form method = "post" action="Reservar_Cita_PoliclinicaJJVallarino.php">
        
        
        <section class="boton_enviar_sistema">
            
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
            
                <a href=""><p class="edit">Editar</p></a>
                <a href=""><p class="delet">Eliminar</p></a>
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