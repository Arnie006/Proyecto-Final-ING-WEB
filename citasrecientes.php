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
$sql_show = "select * from (select prueba_citas.id_citas, prueba_citas.fecha, prueba_citas.id_paciente, medicos.nombre_medico, complejos.nombre_complejos, especialidad.nombre_especialidad from (((medicos inner join prueba_citas on prueba_citas.id_medico = medicos.id) inner join complejos on medicos.id_complejo=complejos.id) inner join especialidad on medicos.id_especialidad=especialidad.id)) as T where id_paciente = 
".$usuario;
$mostrar_citas = mysqli_query($link, $sql_show);

//loop que muestra en pantalla la informacion conseguida en el query, y cicla por si hay mas de una linea de informacion
while($row = mysqli_fetch_array($mostrar_citas)){
    echo $row['id_citas'];
    echo "<br>";
    echo $row['fecha'];
    echo "<br>";
    echo $row['nombre_medico'];
    ?>
    <form method="POST" onsubmit="return confirm('Esta seguro que desea eliminar?');">
    <input type="hidden" name="_METHOD" value="DELETE">
    <input type="hidden" name="id" value="<?php echo $row['id_citas']; ?>">
    <button type="submit">Delete Case</button>
    </form>
    <?php
}

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
<html>

<form method="POST" onsubmit="return confirm('Esta seguro que desea eliminar?');">
    <input type="hidden" name="_METHOD" value="DELETE">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit">Delete Case</button>
</form>
</html>