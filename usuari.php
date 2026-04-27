<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>GI3P - Usuari</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header class="topbar">
        <div class="brand">
            <div class="logo">
                <img src="/images/IP.jpg" alt="Institut Pedralbes">
            </div>
            <div class="brand-text">
                <span class="code">GI3P</span>
                <span>Projecte final</span>
                <span>Gestor d'incidències</span>
            </div>
        </div>
        <nav class="nav">
            <a href="index.php" class="nav-item">
                <img src="inici-removebg-preview.png" alt="">
                <span>INICI</span>
            </a>
            <a href="#" class="nav-item">
                <img src="about_us-removebg-preview.png" alt="">
                <span>SOBRE</span>
            </a>
            <a href="#" class="nav-item">
                <img src="ajuda-removebg-preview.png" alt="">
                <span>AJUDA</span>
            </a>
        </nav>
    </header>

    <h1>Àrea d'Usuari</h1>
    <p>Selecciona què vols fer:</p>

    <div class="opcions">
        <a href="registrar_incidencia.php" class="opcio">
            <i class="fas fa-plus-circle"></i>
            Registrar incidència
        </a>
        <a href="consultar_estat.php" class="opcio">
            <i class="fas fa-search"></i>
            Consultar estat
        </a>
        <a href="incidencies_finalitzades.php" class="opcio">
            <i class="fas fa-check-circle"></i>
            Incidències finalitzades
        </a>
    </div>

</body>
</html>