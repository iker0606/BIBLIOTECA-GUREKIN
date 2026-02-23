<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eder Casalengua, Iker Fernández">
  <link rel="icon" type="image/x-icon" href="./Fotos/GUREKIN.ico">
  <link rel="stylesheet" href="estiloprincipal.css">
  <title>Biblioteca Gurekin - Bilbao</title>
</head>
<body>
  <header>
    <nav class="menu">
      <a href="index.php"><b>Inicio</b></a>
      <a href="./horario/horario.php"><b>Horario</b></a>
      <a href="./populares/populares.php"><b>Populares</b></a>
      <?php
      if (isset($_SESSION['id_usuario'])) {
          echo "<a href='logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
      } else {
          echo "<a href='./acceder/acceder.php'><b>Acceder</b></a>";
      }
      ?>
    </nav>
  </header>

  <main>
    <h1 class="titulo">Biblioteca Gurekin - Biblioteca en Muskiz</h1>
    <p class="direccion"><b>Dirección:</b> C. la Cendeja, 29, 48550 Muskiz, Bizkaia</p>
    <div class="info">
      <div class="columna_izquierda">
        <p><b id="naranja">Teléfono:</b>
          <a id="tlfn" href="tel:946363987">946 363 987</a>
        </p>
        <p><b id="naranja"><i class="fa-solid fa-envelope"></i>Correo Electrónico:</b>
          <a id="email" href="mailto:biblio_gurekin@gurekin.eus">biblio_gurekin@gurekin.eus</a>
        </p>
        <img src="./Fotos/index.png" alt="Biblioteca Gurekin" class="imagen_biblioteca">

        <div class="servicios">
          <h2>Servicios</h2>
          <ul>
            <li>✅ Consulta</li><br>
            <li>✅ Préstamo</li><br>
            <li>✅ Internet (para usuarios)</li><br>
            <li>✅ Wifi</li><br>
          </ul>
        </div>
      </div>

      <div class="columna_derecha">
        <div class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.6291833561913!2d-3.118500711829801!3d43.32202143277601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4ef7ca0c775669%3A0x5e685606625ffe34!2sMuskizko%20Udal%20Liburutegia!5e0!3m2!1ses!2ses!4v1763455653400!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="accesibilidad">
          <h2>ACCESIBILIDAD</h2>
          <p>♿ Personas con diversidad funcional: <b id="naranja">Sí</b></p>
          <p>🧑‍🦯 Personas ciegas: <b id="naranja">Sí</b></p>
          <p>🦻 Personas sordas: <b id="naranja">Sí</b></p>
        </div>
      </div>
    </div>
  </main>

  <div class="gurekin">
    <div class="normas">
      <h2>Normas Básicas de la Biblioteca</h2>
      <ul>
        <li>🤫 Mantén silencio dentro de la biblioteca.</li><br>
        <li>👍 Cuida los libros y devuélvelos en buen estado.</li><br>
        <li>🚫 No consumas alimentos ni bebidas cerca de los libros.</li><br>
        <li>⚠️ Utiliza los equipos y espacios de forma responsable.</li><br>
        <li>🕛 Respeta los horarios y al personal de la biblioteca.</li><br>
      </ul>
    </div>
    <div class="gurekin_img">
      <img src="./Fotos/gurekin.jpeg" alt="Biblioteca Gurekin">
    </div>
  </div>

  <br>
  <nav class="menu_inferior">
    <a href="index.php">Inicio</a>
    <a href="./horario/horario.php">Horario</a>
    <a href="./populares/populares.php">Populares</a>
    <?php
    if (isset($_SESSION['id_usuario'])) {
        echo "<a href='logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
    } else {
        echo "<a href='./acceder/acceder.php'><b>Acceder</b></a>";
    }
    ?>
  </nav>

  <footer>
    <p><b>© 2025 Biblioteca GUREKIN</b></p>
  </footer>
</body>
</html>