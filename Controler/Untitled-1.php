<?php
include("../../template/templatepersona.php");
include("../../conexion.php");
include('../../Model/Pqrs_pqr_model.php');

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['radicado'])) {
    $radicado = $_REQUEST['radicado'];
    $resultado = $pqrs_pqr_model->obtenerDatosUsuario($radicado);

    if (!empty($resultado['respuestaPqr'])) {
        header("Location: respuesta.php");
        exit();
    } else {
        $mensaje = "Aún no tienes respuesta.";
    }
} else {
    $mensaje = ""; // Evita que se muestre el mensaje si no se ha enviado el formulario
}
?>

<br>

<link rel="stylesheet" type="text/css" href="../../ccs/styles.css">

<title>Consultar solicitud</title>

<div class="container mt-5 custom-container text-center" style="background-color: #f0f0f0; padding: 50px; border: 1px solid #ccc; border-radius: 10px; width: max; height: 100%; margin: 10 auto;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Consultar solicitud</h1>
    <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-row">
        <div class="col-md-5 mx-auto">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Código solicitud" name="radicado">
                <input type="submit" class="search-button" value="Buscar">
                <p style="color: red;"><?php echo $mensaje; ?></p>
            </div>
        </div>
    </div>
</form>
</div>
<br><br><br><br><br><br>
<?php include("../../template/templateFooter.php"); ?>








<?php
include("../../template/templatepersona.php");
include("../../conexion.php");
include('../../Model/Pqrs_pqr_model.php');

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['radicado'])) {
    $radicado = $_REQUEST['radicado'];
    $resultado = $pqrs_pqr_model->obtenerDatosUsuario($radicado);

   // var_dump($resultado);
}

?>

<br>

<link rel="stylesheet" type="text/css" href="../../ccs/styles.css">

<title>Cónsulta solicitud</title>

<div class="container mt-5 custom-container text-center" style="background-color: #f0f0f0; padding: 50px; border: 1px solid #ccc; border-radius: 10px; width: max;  height: 100%; margin: 10 auto;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Cónsultar solicitud</h1>
    <form class="needs-validation" action="respuesta.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-row">
        <div class="col-md-5 mx-auto">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Código solicitud" name="radicado">
                <input  type="submit" class="search-button" value="Buscar">
            </div>
        </div>
    </div>
</form>
</div>
<br><br><br><br><br><br>
<?php include("../../template/templateFooter.php"); ?>



<?php
include("../../template/templatepersona.php");
include("../../conexion.php");
include('../../Model/Pqrs_pqr_model.php');

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

$mensaje = "";

if (isset($_REQUEST['radicado'])) {
    $radicado = $_REQUEST['radicado'];
    $resultado = $pqrs_pqr_model->obtenerDatosUsuario($radicado);

    if (!empty($resultado['respuestaPqr'])) {
        echo "<script>window.location.href = 'respuesta.php?radicado=" . $radicado . "';</script>";
        exit();
    } else {
        $mensaje = "Aún no tienes respuesta.";
    }
} else {
    $mensaje = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../ccs/styles.css">
    <title>Consultar solicitud</title>
</head>
<body>
<div class="container mt-5 custom-container text-center" style="background-color: #f0f0f0; padding: 50px; border: 1px solid #ccc; border-radius: 10px; width: max; height: 100%; margin: 10 auto;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Consultar solicitud</h1>
    <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-row">
            <div class="col-md-5 mx-auto">
                <div class="search-container">
                    <input type="text" class="search-box" placeholder="Código solicitud" name="radicado">
                    <input type="submit" class="search-button" value="Buscar">
                    <p style="color: red;"><?php echo $mensaje; ?></p>
                </div>
            </div>
        </div>
    </form>
</div>
<br><br><br><br><br><br>
<?php include("../../template/templateFooter.php"); ?>
</body>
</html>
