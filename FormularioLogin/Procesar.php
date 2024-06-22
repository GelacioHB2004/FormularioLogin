<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $usuario = !empty($_POST['user']) ? htmlspecialchars(trim($_POST['user'])) : "El usuario es requerido";
    $password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : "La contraseña es requerida";
    $edad = !empty($_POST['edad']) ? htmlspecialchars(trim($_POST['edad'])) : "La edad es requerida";
    $errores=[];

    if ($usuario === "luis" && $password === "mendoza" && (is_numeric($edad) && $edad >= 18)) {
        echo "Hola: " . $usuario . " tu contraseña es: " . $password . " y tu edad es: " . $edad;
    } 
    else 
    {
        if ($usuario !== "luis" || $password !== "mendoza" || $edad <18) 
        {
            $errores[] = "Solo el usuario luis puede acceder y debe ser mayor de 18 años";
            $errores[] = "El usuario debe ser luis ";
            $errores[] = "La contraseña debe ser mendoza";
        }


    }
    if (!empty($errores)) {
        echo "<h1>Errores en el formulario:</h1>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}
?>
