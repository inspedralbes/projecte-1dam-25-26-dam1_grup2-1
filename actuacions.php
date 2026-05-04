<?php include 'header.php'; ?>
<?php include 'connexio.php'; ?>

<h1>Gestionar incidència</h1>

<div style="max-width: 600px; margin: 2rem auto; background: white; padding: 2rem;">
    <?php
    $id = $_GET['id'];
    if ($_POST) {
        $nova_data = ($_POST['estat'] == 'Tancada') ? 'CURDATE()' : 'NULL';
        $conn->query("UPDATE incidencies SET data_fi = $nova_data WHERE id_inc='$id'");
        echo "<p style='color: green; font-weight: bold;'>Actualitzat 😎👌🔥</p>";
    }
    $dades = $conn->query("SELECT * FROM incidencies WHERE id_inc='$id'")->fetch_assoc();
    $estat_actual = $dades['data_fi'] ? 'Tancada' : 'Oberta';
    ?>
    <form method="POST">
        <select name="estat" style="width: 100%; padding: 0.5rem;">
            <option value="Oberta" <?= $estat_actual == 'Oberta' ? 'selected' : '' ?>>Oberta</option>
            <option value="Tancada" <?= $estat_actual == 'Tancada' ? 'selected' : '' ?>>Tancada</option>
        </select>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</div>
<?php include 'footer.php'; ?>