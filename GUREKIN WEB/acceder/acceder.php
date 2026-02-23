<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="acceder.css">
  <title>Acceder | Biblioteca GUREKIN</title>
</head>
<body>
  <header>
    <nav class="menu">
      <a href="../index.php"><b>Inicio</b></a>
      <a href="../horario/horario.php"><b>Horario</b></a>
      <a href="../populares/populares.php"><b>Populares</b></a>
      <?php
      if (isset($_SESSION['id_usuario'])) {
          echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
      } else {
          echo "<a href='acceder.php'><b>Acceder</b></a>";
      }
      ?>
    </nav>
  </header>

  <br><br><br>

  <div class="form_acceso">
    <?php if (isset($_SESSION['id_usuario'])): ?>
        <h2>¡Bienvenido de nuevo!</h2>
        <p>Ya tienes una sesión iniciada.</p>
        <a href="../index.php" class="button">Ir al Inicio</a>

    <?php else: ?>
        <h2>Acceso / Registro</h2>

        <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] === 'contrasena'): ?>
                <p style="color: red;">Contraseña incorrecta. Inténtalo de nuevo.</p>
            <?php endif; ?>
        <?php endif; ?>

        <form action="gestion.php" method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Entrar al Sistema</button>
        </form>
    <?php endif; ?>
  </div>

  <br><br><br>

  <nav class="menu_inferior">
    <a href="../index.php">Inicio</a>
    <a href="../horario/horario.php">Horario</a>
    <a href="../populares/populares.php">Populares</a>
    <?php
    if (isset($_SESSION['id_usuario'])) {
        echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
    } else {
        echo "<a href='acceder.php'><b>Acceder</b></a>";
    }
    ?>
  </nav>

  <footer>
    <p><b>© 2025 Biblioteca GUREKIN</b></p>
  </footer>
</body>
</html>