<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eder Casalengua, Iker Fernández">
  <link rel="icon" type="image/x-icon" href="../Fotos/GUREKIN.ico">
  <link rel="stylesheet" href="populares.css">
  <title>Populares | Biblioteca GUREKIN</title>
</head>
<body>
  <header>
    <nav class="menu">
      <a href="../index.php"><b>Inicio</b></a>
      <a href="../horario/horario.php"><b>Horario</b></a>
      <a href="populares.php"><b>Populares</b></a>
      <?php
      if (isset($_SESSION['id_usuario'])) {
          echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
      } else {
          echo "<a href='../acceder/acceder.php'><b>Acceder</b></a>";
      }
      ?>
    </nav>
  </header>

  <section class="populares">
    <h1>Libros Populares del Momento</h1>

    <div class="lista">
      <?php
      $conexion = mysqli_connect("localhost", "root", "", "biblioteca_muskiz");
      if (mysqli_connect_errno()) {
          echo "Error al conectar: " . mysqli_connect_error();
          exit();
      }

      $query = "SELECT * FROM libros";
      $resultado = mysqli_query($conexion, $query);

      while ($fila = mysqli_fetch_assoc($resultado)) {
          $libro_id = $fila['id_libro'];

          echo '<div class="libro">';
          echo '  <a href="' . htmlspecialchars($fila['url_wiki']) . '" target="_blank">';
          echo '    <div class="imagen" style="background-image: url(\'' . htmlspecialchars($fila['ruta_imagen']) . '\');"></div>';
          echo '  </a>';
          echo '  <div class="info-libro">';
          echo '    <h3>' . htmlspecialchars($fila['titulo']) . '</h3>';
          echo '    <p class="autor">' . htmlspecialchars($fila['autor']) . '</p>';
          echo '    <p class="descripcion">' . htmlspecialchars(substr($fila['descripcion'], 0, 120)) . '...</p>';
          echo '    <p class="votos">' . (int)$fila['num_votos'] . ' votos</p>';

          if (isset($_SESSION['id_usuario'])) {
              $usuario_id = (int)$_SESSION['id_usuario'];

              $stmt = mysqli_prepare($conexion, "SELECT * FROM votos WHERE usuario_id = ? LIMIT 1");
              mysqli_stmt_bind_param($stmt, "i", $usuario_id);
              mysqli_stmt_execute($stmt);
              $consulta_voto = mysqli_stmt_get_result($stmt);

              if (mysqli_num_rows($consulta_voto) == 0) {
                  echo '<form method="POST" action="votar.php">
                          <input type="hidden" name="libro_id" value="' . $libro_id . '">
                          <button type="submit" class="btn-votar">Votar como favorito</button>
                        </form>';
              } else {
                  echo '<p class="ya-votado">Ya has votado tu libro favorito</p>';
              }
          } else {
              echo '<p class="ya-votado"><a href="../acceder/acceder.php">Inicia sesión para votar</a></p>';
          }

          echo '  </div>';
          echo '</div>';
      }

      mysqli_close($conexion);
      ?>
    </div>
  </section>

  <nav class="menu_inferior">
    <a href="../index.php">Inicio</a>
    <a href="../horario/horario.php">Horario</a>
    <a href="populares.php">Populares</a>
    <?php
    if (isset($_SESSION['id_usuario'])) {
        echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
    } else {
        echo "<a href='../acceder/acceder.php'><b>Acceder</b></a>";
    }
    ?>
  </nav>

  <footer class="footer">
    <p><b>© 2025 Biblioteca GUREKIN</b></p>
  </footer>
</body>
</html>