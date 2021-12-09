<?php
require_once "config.php";
session_start();
$usuario = $_SESSION['row']['id'];
$sql_show = "select * from (select prueba_citas.id, prueba_citas.fecha, prueba_citas.id_paciente, medicos.nombre_medico, complejos.nombre_complejos, especialidad.nombre_especialidad from (((medicos inner join prueba_citas on prueba_citas.id_medico = medicos.id) inner join complejos on medicos.id_complejo=complejos.id) inner join especialidad on medicos.id_especialidad=especialidad.id)) as T where id_paciente = 10; 
";
$mostrar_citas = mysqli_query($link, $sql_show);

while($row = mysqli_fetch_array($mostrar_citas)){
    echo $row['id'];
    echo "<br>";
    echo $row['fecha'];
    echo "<br>";
    echo $row['nombre_medico'];
    ?>
    <form method="POST" onsubmit="return confirm('Esta seguro que desea eliminar?');">
    <input type="hidden" name="_METHOD" value="DELETE">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <button type="submit">Delete Case</button>
    </form>
    <?php
}


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