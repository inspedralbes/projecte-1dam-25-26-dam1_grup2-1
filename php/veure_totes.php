<?php 'include header.php'?>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/styles.css">
    <title>GI3P - Tècnic</title>
    <h2>Veure Totes</h2>

<?php
require_once 'connexio.php';
?>
<?php
$id = $_POST['id_incidencia'];
$sql = "SELECT * FROM incidencies";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["departament_id"] 
            .$row["data_ini"]   
            .$row["prioritat"]      
            .$row["tecnic_id"];
        echo " <a href='esborrar.php?id=" . $row["id_inc"] . "'>Esborrar</a></p>";
    }
} else {
    echo "<p> No hi ha dades a mostrar.</p>";
}
$conn->close();
?>