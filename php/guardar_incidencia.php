<?php
include 'connexio.php';

$departament = $_POST['departament_id'];
$descripcio = $_POST['descripcio'];

$descripcio = $conn->real_escape_string($descripcio);

$sql = "INSERT INTO incidencies (descripcio, data_ini, prioritat, departament_id) 
        VALUES ('$descripcio', CURDATE(), 'Baixa', $departament)";

if ($conn->query($sql)) {
    header("Location: registrar_incidencia.php?success=1&id=" . $conn->insert_id);
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>