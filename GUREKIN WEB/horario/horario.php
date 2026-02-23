<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eder Casalengua, Iker Fernández">
  <link rel="icon" type="image/x-icon" href="../Fotos/GUREKIN.ico">
  <link rel="stylesheet" href="horario.css">
  <title>Horario | Biblioteca GUREKIN</title>
</head>
<body>
  <header>
    <nav class="menu">
      <a href="../index.php"><b>Inicio</b></a>
      <a href="horario.php"><b>Horario</b></a>
      <a href="../populares/populares.php"><b>Populares</b></a>
      <?php
      if (isset($_SESSION['id_usuario'])) {
          echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
      } else {
          echo "<a href='../acceder/acceder.php'><b>Acceder</b></a>";
      }
      ?>
    </nav>
  </header>

  <main>
    <h1 id="titulo">Horario Biblioteca Gurekin</h1>
    <table>
      <thead>
        <tr>
          <th>DÍA</th>
          <th>HORARIO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="dia">LUNES</td>
          <td>08:00 / 14:30 -- 16:00 / 20:00</td>
        </tr>
        <tr>
          <td class="dia">MARTES</td>
          <td>08:00 / 14:30 -- 16:00 / 20:00</td>
        </tr>
        <tr>
          <td class="dia">MIÉRCOLES</td>
          <td>08:00 / 14:30</td>
        </tr>
        <tr>
          <td class="dia">JUEVES</td>
          <td>08:00 / 14:30 -- 16:00 / 20:00</td>
        </tr>
        <tr>
          <td class="dia">VIERNES</td>
          <td>08:00 / 14:30 -- 16:00 / 20:00</td>
        </tr>
        <tr>
          <td class="dia">SÁBADO</td>
          <td>08:00 / 14:30</td>
        </tr>
      </tbody>
    </table>
    <br><br>
    <p id="excepto"><b>Excepto los días festivos</b></p>

    <div class="festivos">
      <div class="primeros">
        <p>1 de enero (miércoles): Año Nuevo.</p>
        <p>6 de enero (lunes): Epifanía del Señor.</p>
        <p>17 de abril (jueves): Jueves Santo.</p>
        <p>18 de abril (viernes): Viernes Santo.</p>
        <p>21 de abril (lunes): Lunes de Pascua.</p>
        <p>25 de julio (viernes): Santiago Apóstol.</p>
      </div>
      <div class="segundos">
        <p>15 de agosto (viernes): Asunción de la Virgen.</p>
        <p>1 de noviembre (sábado): Todos los Santos.</p>
        <p>6 de diciembre (sábado): Día de la Constitución Española.</p>
        <p>8 de diciembre (lunes): Inmaculada Concepción.</p>
        <p>25 de diciembre (jueves): Navidad.</p>
      </div>
    </div>
  </main>

  <nav class="menu_inferior">
    <a href="../index.php">Inicio</a>
    <a href="horario.php">Horario</a>
    <a href="../populares/populares.php">Populares</a>
    <?php
    if (isset($_SESSION['id_usuario'])) {
        echo "<a href='../logout.php' style='color: #ff4d4d;'><b>Cerrar Sesión</b></a>";
    } else {
        echo "<a href='../acceder/acceder.php'><b>Acceder</b></a>";
    }
    ?>
  </nav>

  <footer>
    <p><b>© 2025 Biblioteca GUREKIN</b></p>
  </footer>
</body>
</html>