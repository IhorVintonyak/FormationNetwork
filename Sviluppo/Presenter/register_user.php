<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["username"] ?? ''));
    $password = htmlspecialchars(trim($_POST["password"] ?? ''));
    $role = htmlspecialchars(trim($_POST["role"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));

    $errors = [];
    if (empty($username)) $errors[] = "Nome utente mancante.";
    if (empty($password)) $errors[] = "Password mancante.";
    if (empty($role)) $errors[] = "Ruolo non selezionato.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email non valida.";

    if (empty($errors)) {
        $record = "$username | $password | $role | $email" . PHP_EOL;
        file_put_contents("../Model/utenti.txt", $record, FILE_APPEND);
        echo "<p style='color:green;'>Account creato con successo!</p>";
    } else {
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>