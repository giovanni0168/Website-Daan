<?php
$melding = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voornaam = trim(is_string($_POST['voornaam'] ?? null) ? $_POST['voornaam'] : '');
    $achternaam = trim(is_string($_POST['achternaam'] ?? null) ? $_POST['achternaam'] : '');
    $email = is_string($_POST['email'] ?? null) ? trim($_POST['email']) : '';
    if ($voornaam === '' || $achternaam === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $melding = 'Vul alle velden in met een geldig e-mailadres.';
    } else {
        $melding = 'Bedankt ' . $voornaam . '! Je formulier is ontvangen.';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsbrief | LevelUp Hardware</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once 'header.php'; ?>
    <main>
        <h1>Schrijf je in voor de nieuwsbrief</h1>
        <?php if ($melding !== ''): ?>
            <p role="status"><?= htmlspecialchars($melding, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        <form id="nieuwsbrief" class="nieuwsbrief" method="post" action="nieuwsbrief.php">
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" id="voornaam" maxlength="100" autocomplete="given-name" required>
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" id="achternaam" maxlength="100" autocomplete="family-name" required>
            <label for="email">E-mailadres</label>
            <input type="email" name="email" id="email" maxlength="254" autocomplete="email" required>
            <button class="knop" type="submit" id="knop">Inschrijven</button>
        </form>
    </main>
    <?php require_once 'footer.php'; ?>
</body>
</html>
