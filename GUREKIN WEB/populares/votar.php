<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "biblioteca_muskiz");
if (mysqli_connect_errno()) {
    header("Location: populares.php");
    exit();
}

if (isset($_SESSION['id_usuario'])) {
    $usuario_id = (int)$_SESSION['id_usuario'];
    $libro_id   = (int)$_POST['libro_id'];

    $check = mysqli_prepare($conexion, "SELECT * FROM votos WHERE usuario_id = ? LIMIT 1");
    mysqli_stmt_bind_param($check, "i", $usuario_id);
    mysqli_stmt_execute($check);
    $resultado = mysqli_stmt_get_result($check);

    if (mysqli_num_rows($resultado) == 0) {
        
        $stmt = mysqli_prepare($conexion, "INSERT INTO votos (usuario_id, libro_id) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $libro_id);
        mysqli_stmt_execute($stmt);

        $stmt2 = mysqli_prepare($conexion, "UPDATE libros SET num_votos = num_votos + 1 WHERE id_libro = ?");
        mysqli_stmt_bind_param($stmt2, "i", $libro_id);
        mysqli_stmt_execute($stmt2);
    }
}

mysqli_close($conexion);
header("Location: populares.php");
exit();
?>