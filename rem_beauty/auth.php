<?php
session_start();
require_once "conexion.php";
$mensajeRegistro = "";
$mensajeLogin = "";

// REGISTRO DE USUARIOS
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["registrar"])) {
    $nombre = trim($_POST["nombre"] ?? "");
    $apellidos = trim($_POST["apellidos"] ?? "");
    $correo = strtolower(trim($_POST["correo"] ?? ""));
    $fecha = $_POST["fecha_nacimiento"] ?? "";
    $telefono = trim($_POST["telefono"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";

    if ($nombre === "" || $apellidos === "" || !filter_var($correo, FILTER_VALIDATE_EMAIL) || !$fecha || strlen($contrasena) < 8) {
        $mensajeRegistro = "Revisa los campos obligatorios. La contraseña debe tener al menos 8 caracteres.";
    } else {
        $q = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $q->execute([$correo]);
        if ($q->fetch()) {
            $mensajeRegistro = "Este correo ya está registrado. Inicia sesión.";
        } else {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $q = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, fecha_nacimiento, telefono, contrasena) VALUES (?, ?, ?, ?, ?, ?)");
            $q->execute([$nombre, $apellidos, $correo, $fecha, $telefono, $hash]);
            $mensajeRegistro = "¡Registro exitoso! Ya puedes iniciar sesión.";
        }
    }
}

// INICIO DE SESIÓN
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iniciar"])) {
    $correo = strtolower(trim($_POST["correo_login"] ?? ""));
    $contrasena = $_POST["contrasena_login"] ?? "";

    $q = $conexion->prepare("SELECT nombre, apellidos, contrasena FROM usuarios WHERE correo = ? LIMIT 1");
    $q->execute([$correo]); 
    $usuario = $q->fetch();

    if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {
        $_SESSION["usuario"] = $usuario["nombre"] . " " . $usuario["apellidos"];
        // CAMBIO AQUÍ: Redirige a index.php en lugar de inicio.php
        header("Location: index.php"); 
        exit;
    } else {
        $mensajeLogin = "Correo o contraseña incorrectos.";
    }
}

// CERRAR SESIÓN (Opción por parámetro GET)
if (isset($_GET["salir"])) { 
    session_destroy(); 
    // CAMBIO AQUÍ: Redirige a index.php en lugar de inicio.php
    header("Location: index.php"); 
    exit; 
}
?>