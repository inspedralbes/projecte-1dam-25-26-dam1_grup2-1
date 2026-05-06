<?php include 'header.php'; ?>
<?php include 'connexio.php'; ?>

<h1>Actuacions de la incidència</h1>
<div style="max-width: 900px; margin: 2rem auto; background: white; padding: 2rem; color: black;">
    <?php
    $id = $_GET['incidencia_id'];
    $inc = $conn->query
    ("SELECT i.id_inc, i.descripcio, d.nom AS departament 
    FROM incidencies i 
    LEFT JOIN departaments d ON i.departament_id = d.id_dept 
    WHERE i.id_inc='$id'")->fetch_assoc();?>

    <p style="color: black;"><strong>ID Incidència:</strong> <?php echo $inc['id_inc']; ?></p>
    <h3 style="color: black;">Actuacions realitzades</h3>
    <?php
    $actuacions = $conn->query("SELECT * FROM actuacions WHERE incidencia_id='$id' ORDER BY data_actuacio ASC");
    
    if ($actuacions->num_rows == 0) {
        echo "<p style='color: black;'>No hi ha actuacions registrades per aquesta incidència.</p>";
    } else {
    ?>
        <table border="1" style="width: 100%; border-collapse: collapse; color: black;">
            <tr style="background: #f0f0f0;">
                <th style="color: black;">Data</th>
                <th style="color: black;">Descripció</th>
                <th style="color: black;">Temps (min)</th>
            </tr>
            <?php while ($act = $actuacions->fetch_assoc()): ?>
            <tr style="color: black;">
                <td style="color: black;"><?php echo $act['data_actuacio']; ?></td>
                <td style="color: black;"><?php echo $act['descripcio']; ?></td>
                <td style="color: black;"><?php echo $act['temps_minuts']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php } ?>

    <br>
    <a href="incidencies_finalitzades.php" style="color: black;">Tornar</a>
</div>

<?php include 'footer.php'; ?>