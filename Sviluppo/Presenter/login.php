<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    $found = false;
    $file = fopen("../Model/utenti.txt", "r");

    while (($line = fgets($file)) !== false) {
        list($storedUser, $storedPass, $role, $email) = array_map('trim', explode('|', $line));
        if ($username === $storedUser && $password === $storedPass) {
            $found = true;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
            break;
        }
    }

    fclose($file);

    if ($found) {
        echo "<p style='color:green;'>Login riuscito. Benvenuto, $username!</p>";
        // header("Location: dashboard.php"); // redirect se vuoi
    } else {
        echo "<p style='color:red;'>Nome utente o password errati.</p>";
    }
}
?>