<?php
/** @var $db */
session_start();


if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

$errors = [];

if (isset($_POST['submit'])) {
    require_once 'includes/db.php';

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
    $business = mysqli_real_escape_string($db, $_POST['business']);

    if(empty($_POST['phone'])) {
        $phone = null;
    } else {
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
    }



    require_once 'includes/formvalidator.php';

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Er is al een account met deze e-mail.";
    }

    $query = "SELECT * FROM users WHERE phone = '$phone'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors['phone'] = "Er is al een account met dit telefoon nummer.";
    }

    if(empty($errors)) {
        $hashword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, surname, email, password, business_name, phone) VALUES ('$name', '$surname', '$email', '$hashword', '$business', '$phone')";

        if(mysqli_query($db, $query)) {
            header('Location: login.php');
            exit;
        } else {
            $errors['db'] = 'Er is iets fout gegaan met het toevoegen van het account.';
        }

        header('Location: login.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hoofdpagina </title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/register.js" defer></script>
</head>
<body>

<p><?= $errors['db'] ?? ''?></p>

<form action="" method="post">
    <div>
        <label for="name">Voornaam*</label>
        <input type="text" name="name" class="field" value="<?= $name ?? ''?>">
        <p class="error"><?= $errors['name'] ?? '' ?></p>
    </div>

    <div>
        <label for="surname">Achternaam*</label>
        <input type="text" name="surname" class="field" value="<?= $surname ?? ''?>">
        <p class="error"><?= $errors['surname'] ?? '' ?></p>
    </div>

    <div>
        <label for="email">E-Mail*</label>
        <input type="text" name="email" class="email" value="<?= $email ?? ''?>">
        <p class="error"><?=$errors['email'] ?? '' ?></p>
    </div>

    <div>
        <label for="business">Bedrijf</label>
        <input type="text" name="business" class="field" value="<?= $business ?? '' ?>">
        <p class="error"><?=$errors['business'] ?? ''?></p>
    </div>

    <div>

        <label for="password">Wachtwoord</label>
        <input type="password" name="password" class="field">
    </div>

    <div>
        <label for="confirm_password">Wachtwoord bevestigen</label>
        <input type="text" name="confirm_password" class="field">
        <div id="checklist">
            <p id="length">x 8 tekens lang</p>
            <p id="capital">x 1 hoofdletter</p>
            <p id="number">x 1 cijfer</p>
            <p id="spec">x 1 speciaal teken</p>
        </div>
        <p class="error"> <?= $errors['password'] ?? ''?></p>
        <p class="error"> <?= $errors['confirm_password'] ?? ''?></p>
    </div>

    <div>
        <label for="phone">Telefoonnummer</label>
        <input type="text" name="phone" class="field" value="<?= $phone ?? '' ?>">
        <p class="error"> <?= $errors['phone'] ?? ''?></p>
    </div>



    <button type="submit" name="submit" id="submit_button">Registreer</button>
</form>
</body>


</html>
