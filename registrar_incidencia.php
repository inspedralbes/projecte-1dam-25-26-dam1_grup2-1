<?php include 'header.php'; ?>
<?php include 'connexio.php'; ?>

<div style="max-width: 600px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 20px;">
    <h2 style="color: #000000; text-align: center;">Registrar Nova Incidència</h2>
    <p style="text-align: center; color: #666;">Omple el formulari per reportar un problema</p>

    <?php if (isset($_GET['success']) && isset($_GET['id'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; text-align: center;">
             <strong>Incidència registrada correctament!</strong><br>
            El teu número d'incidència és: <strong style="font-size: 1.5rem;"><?php echo htmlspecialchars($_GET['id']); ?></strong>
            <br><br>
            <small>Guarda aquest número per consultar l'estat de la teva incidència.</small>
        </div>
    <?php endif; ?>

    <form method="POST" action="guardar_incidencia.php" id="incidenciaForm">
        <div style="margin-bottom: 1.5rem;">
            <label for="departament_id" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #000000;">Departament</label>
            <select name="departament_id" id="departament_id" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 10px; font-size: 1rem;">
                <option value="">Selecciona un departament</option>
                <?php
                $sql = "SELECT id_dept, nom FROM departaments ORDER BY nom";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_dept'] . "'>" . htmlspecialchars($row['nom']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="descripcio" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #000000;">Descripció del problema</label>
            <textarea name="descripcio" id="descripcio" rows="5" required placeholder="Explica detalladament el problema" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 10px; font-size: 1rem; resize: vertical;"></textarea>
            <small style="color: #666;">Mínim 10 caràcters</small>
        </div>

        <button type="submit" style="width: 100%; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: transform 0.2s;">
            Registrar Incidència
        </button>
    </form>
</div>

<script>
    document.getElementById('incidenciaForm').addEventListener('submit', function(e) {
        const departament = document.getElementById('departament_id').value;
        const descripcio = document.getElementById('descripcio').value.trim();
        
        if (!departament) {
            alert('Si us plau, selecciona un departament');
            e.preventDefault();
            return false;
        }
        
        if (descripcio.length < 10) {
            alert('La descripció ha de tenir almenys 10 caràcters');
            e.preventDefault();
            return false;
        }
        
        return true;
    });
</script>

<?php include 'footer.php'; ?>