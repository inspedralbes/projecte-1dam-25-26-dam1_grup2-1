<?php include 'header.php'; ?>
<?php include 'connexio.php'; ?>

<div style="max-width: 600px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 5px 15px rgb(145, 16, 231);">
    <p style="text-align: center; color: #000000;">Registra la teva incidència aquí:</p>

    <?php if (isset($_GET['success']) && isset($_GET['id'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; text-align: center;">
            Incidència creada, el teu ID és: <strong><?php echo $_GET['id']; ?></strong>
        </div>
    <?php endif; ?>

    <form method="POST" action="guardar_incidencia.php">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: black;">Departament</label>
            <select name="departament_id" required style="width: 100%; padding: 0.5rem;">
                <option value="">Selecciona departament:</option>
                <?php
                $result = $conn->query("SELECT id_dept, nom FROM departaments ORDER BY nom");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_dept'] . "'>" . $row['nom'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: black;">Descripció de la incidència</label>
            <textarea name="descripcio" rows="4" style="width: 100%; padding: 0.5rem;"></textarea>
            <small style="color: gray;">Mínim 10 caràcters</small>
        </div>

        <button type="submit" style="width: 100%; padding: 0.8rem; background: #300c55; color: white; border-radius: 10px; box-shadow: 0 5px 15px rgb(145, 16, 231)">Registrar</button>
    </form>
</div>

<script>
document.querySelector('form').onsubmit = function() {
    let desc = document.querySelector('[name="descripcio"]').value.trim();
    if (desc.length < 10) {
        alert('La descripció ha de tenir 10 caràcters mínim');
        return false;
    }
    return true;
};
</script>

<?php include 'footer.php'; ?>