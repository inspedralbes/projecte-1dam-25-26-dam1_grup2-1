<?php include 'header.php'; ?>
<?php include 'connexio.php'; ?>

<h1>Gestionar incidència</h1>
<div style="max-width: 600px; margin: 2rem auto; background: white; padding: 2rem;">
    <?php
    $id = $_GET['id'];
    if ($_POST) {
        $nova_data = ($_POST['estat'] == 'Tancada') ? 'CURDATE()' : 'NULL';
        $conn->query("UPDATE incidencies SET data_fi = $nova_data WHERE id_inc='$id'");
        
        $descripcio_actuacio = $conn->real_escape_string($_POST['descripcio_actuacio']);
        $data_actuacio = $_POST['data_actuacio'];
        $temps_minuts = $_POST['temps_minuts'];
        
        $conn->query("INSERT INTO actuacions (descripcio, data_actuacio, temps_minuts, visible_usuari, incidencia_id) 
                      VALUES ('$descripcio_actuacio', '$data_actuacio', $temps_minuts, 1, $id)");
        
        echo "<p style='color: green; font-weight: bold;'>Actualitzat 😎👌🔥</p>";
    }
    $dades = $conn->query("SELECT * FROM incidencies WHERE id_inc='$id'")->fetch_assoc();
    $estat_actual = $dades['data_fi'] ? 'Tancada' : 'Oberta'; ?>
    
    <form method="POST">
        <p style="color:black;">Estat d'Incidència</p>
        <select name="estat" style="width: 100%; padding: 0.5rem;">
            <option value="Oberta" <?= $estat_actual == 'Oberta' ? 'selected' : '' ?>>Oberta</option>
            <option value="Tancada" <?= $estat_actual == 'Tancada' ? 'selected' : '' ?>>Tancada</option>
        </select>
        <br><br>
        
        <p style="color:black;">Descripció de l'actuació</p>
        <textarea name="descripcio_actuacio" rows="4" style="width: 100%; padding: 0.5rem;" required></textarea>
        <br><br>

        <p style ="color: black;">Temps (minuts)</p>
        <input type="number" name="temps_minuts" value="0" style="width: 100%; padding: 0.5rem;" required>
        <br><br>

        <p style="color: black;">Data Actuació</p>
        <input type="date" name="data_actuacio" value="<?= date('Y-m-d') ?>" style="width: 100%; padding: 0.5rem;" required>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</div>

<?php include 'footer.php'; ?>