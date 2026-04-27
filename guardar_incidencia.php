<?php
include 'connexio.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $departament_id = $_POST['departament_id'] ?? null;
    $descripcio = $_POST['descripcio'] ?? '';
    
    $errors = [];
    
    if (empty($departament_id)) {
        $errors[] = "Has de seleccionar un departament";
    }
    
    if (empty($descripcio) || strlen($descripcio) < 10) {
        $errors[] = "La descripció ha de tenir almenys 10 caràcters";
    }
    
    if (!empty($errors)) {
        echo "<h1>Errors</h1>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<a href='registrar_incidencia.php'>← Tornar enrere</a>";
        exit;
    }
    
    $descripcio = $conn->real_escape_string($descripcio);
    
    $sql = "INSERT INTO incidencies (descripcio, data_ini, prioritat, departament_id, tecnic_id, tipus_id) 
            VALUES ('$descripcio', CURDATE(), 'Baixa', $departament_id, NULL, NULL)";
    
    if ($conn->query($sql) === TRUE) {
        $incidencia_id = $conn->insert_id;
        header("Location: registrar_incidencia.php?success=1&id=" . $incidencia_id);
        exit;
    } else {
        echo "Error al guardar la incidència: " . $conn->error;
        echo "<br><a href='registrar_incidencia.php'>← Tornar enrere</a>";
    }
    
} else {
    header("Location: registrar_incidencia.php");
    exit;
}

$conn->close();
?>