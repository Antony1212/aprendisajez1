<?php
$timezone = new DateTimeZone('America/Lima'); // Define el huso horario de Lima
$fechaHoraActual = new DateTime('now', $timezone);
$fechaHoraActualString = $fechaHoraActual->format('Y-m-d H:i:s');
// Obtener los datos enviados por AJAX
$idSubnivel = $_POST['idSubnivel'];;
$usuariopregunta = $_POST['usuariopregunta'];
$idnivelpregunta = $_POST['idnivelpregunta'];

// Aquí puedes realizar la lógica para actualizar los datos en la base de datos
// Por ejemplo, puedes usar la conexión PDO establecida previamente

$pdo = new PDO("mysql:host=localhost;dbname=mathbathles", "root", '');

$query = "UPDATE progresousuario SET estado = 'culminado', fechaFinal = :hora, puntaje = 10 WHERE idUsuario = :idUsuario AND idNivel = :idNivel AND idSubnivel = :idSubnivel";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':idUsuario', $usuariopregunta);
$stmt->bindParam(':idNivel', $idnivelpregunta);
$stmt->bindParam(':idSubnivel', $idSubnivel);
$stmt->bindParam(':hora', $fechaHoraActualString);
$stmt->execute();

if ($idSubnivel==8) {
    $idnivelpregunta= $idnivelpregunta+1;
    $idSubnivel=1;
}else {
    $idSubnivel=$idSubnivel+1;
}

$query1 = "INSERT INTO progresousuario VALUES (null, $usuariopregunta, $idnivelpregunta, '$fechaHoraActualString', '', 'progreso', $idSubnivel, 0)";
$stmt1 = $pdo->prepare($query1);

$stmt1->execute();

// Aquí puedes agregar cualquier otra lógica o manipulación de datos necesaria
$boundQueryInsert = str_replace(array_keys($stmt->getBindings()), array_values($stmt->getBindings()), $query);
echo "<script>alert('Query Insert: " . $boundQuery . "');</script>";

// Finalmente, puedes enviar una respuesta al cliente para indicar el éxito de la operación
// Por ejemplo, puedes enviar un mensaje de éxito como respuesta JSON
$response = array('success' => true, 'message' => 'Datos actualizados correctamente (acierto)');
echo json_encode($response);
?>



