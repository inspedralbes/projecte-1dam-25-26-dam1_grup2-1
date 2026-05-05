<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/styles.css">
<?php
require_once 'connexio.php';
?>
<h1>Llistat d'actuacions</h1>
<?php
$id = $_POST['id_incidencia'];
$sql = "SELECT * FROM incidencies WHERE id_inc=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p> Incidencia número:  " . $row["id_inc"] . " Del departament: " . htmlspecialchars($row["departament_id"]);
        echo " <a href='esborrar.php?id=" . $row["id_inc"] . "'>Esborrar</a></p>";
    }
} else {
    echo "<p>No hi ha dades a mostrar.</p>";
}
$conn->close();
?>