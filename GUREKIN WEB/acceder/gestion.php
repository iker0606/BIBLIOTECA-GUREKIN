<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "biblioteca_muskiz");
if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit();
}

$correo    = $_REQUEST['correo'];
$contrasena = $_REQUEST['contrasena'];

$stmt = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE correo = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['correo']     = $user['correo'];
        mysqli_close($conexion);
        header("Location: ../index.php");
        exit();
    } else {
        
        mysqli_close($conexion);
        header("Location: acceder.php?error=contrasena");
        exit();
    }
} else {
    
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $stmt2 = mysqli_prepare($conexion, "INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt2, "ss", $correo, $contrasena_hash);
    mysqli_stmt_execute($stmt2);

    $_SESSION['id_usuario'] = mysqli_insert_id($conexion);
    $_SESSION['correo']     = $correo;
    mysqli_close($conexion);
    header("Location: ../index.php");
    exit();
}
?>