<?php
$timezone = new DateTimeZone('America/Lima'); // Define el huso horario de Lima
$fechaHoraActual = new DateTime('now', $timezone);
$fechaHoraActualString = $fechaHoraActual->format('Y-m-d H:i:s');
// Obtener los datos enviados por AJAX

$usuariopregunta = $_POST['usuariopregunta'];
$idnivelpregunta = $_POST['idnivelpregunta'];
$vidausuario = $_POST['vidausuario'];

$vida=$vidausuario-1;
// Aquí puedes realizar la lógica para actualizar los datos en la base de datos
// Por ejemplo, puedes usar la conexión PDO establecida previamente
//$pdo = new PDO("mysql:host=localhost;dbname=mathbathles", "root", '');
$pdo = new PDO("mysql:host=localhost;dbname=id20986735_mathbathles", "id20986735_antony", '.Dotero1512');

$query = "UPDATE vidas SET nrovida = $vida  WHERE idvida_usuario = '$usuariopregunta'";
$stmt = $pdo->prepare($query);

$stmt->execute();

$response = array('success' => true, 'message' => 'Datos actualizados correctamente (acierto)');
echo json_encode($response);
?>
