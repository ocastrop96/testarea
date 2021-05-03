<?php
require 'modelo_grafico.php';
$fechaInicio = $_POST["inicio"];
$fechaFin = $_POST["fin"];

$MG = new Modelo_Grafico;
$consulta = $MG->TraerDatosGraficoParametro($fechaInicio,$fechaFin);
echo json_encode($consulta);