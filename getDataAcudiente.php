<?php
header("Access-Control-Allow-Origin: *");
require_once("datos_conexion.php");
$mysqli = new mysqli($host, $user, $pass, $database);
$info = json_decode(file_get_contents("php://input"));

$sql = "Select acudiente,telefono1,telefono2 from estugrupos where estudiante='$info->estudiante' and year=year(curdate())";

$resultado = $mysqli->query($sql);
$datos = array();
while ($dato = $resultado->fetch_assoc())
    $datos[] = $dato;
echo json_encode($datos);
$resultado->free();
$mysqli->close();
?>