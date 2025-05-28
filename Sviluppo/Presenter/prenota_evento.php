<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = htmlspecialchars(trim($_POST["eventName"] ?? ''));
    $date = htmlspecialchars(trim($_POST["date"] ?? ''));
    $number = intval($_POST["number"] ?? 0);
    $description = htmlspecialchars(trim($_POST["description"] ?? ''));

    $errors = [];
    if (empty($eventName)) $errors[] = "Il nome dell'evento è obbligatorio.";
    if (empty($date)) $errors[] = "La data è obbligatoria.";
    if ($number <= 0) $errors[] = "Il numero di posti deve essere maggiore di zero.";
    if (empty($description)) $errors[] = "La descrizione è obbligatoria.";

    if (empty($errors)) {
        $record = "$eventName | $date | $number posti | $description" . PHP_EOL;
        file_put_contents("../Model/prenotazioni.txt", $record, FILE_APPEND);
        echo "<p style='color:green;'>Prenotazione registrata con successo!</p>";
    } else {
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>