<?php 'include header.php'?>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/styles.css">
    <title>GI3P - Usuari</title>
    <h2>Incidencies finalitzades</h2>
<?php
require_once 'connexio.php';
?>
<?php
$sql = "SELECT * FROM incidencies WHERE data_fi IS NOT NULL";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["id_inc"] 
            .$row["departament_id"]   
            .$row["data_ini"]      
            .$row["data_fi"]
            .$row["tecnic_id"];
        echo " <a href='esborrar.php?id=" . $row["id_inc"] . "'>Esborrar</a></p>";
    }
} else {
    echo "<p> No hi ha dades a mostrar.</p>";
}
$conn->close();
?>