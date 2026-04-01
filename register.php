<?php
/** @var $db */
session_start();


if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    require_once 'includes/db.php';

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
    $business = mysqli_real_escape_string($db, $_POST['business']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $errors = [];

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
        $query = "INSERT INTO users (name, surname, email, password, business, phone) VALUES ('$name', '$surname', '$email', '$hashword', '$business', '$phone')";

        if(mysqli_query($db, $query)) {
            header('Location: login.php');
            exit;
        } else {
            $errors['db'] = 'Er is iets fout gegaan met het toevoegen van het account.';
        }
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
    <script src="js/main.js" defer></script>
</head>
<body>


<form action="" method="post">
    <input type="text" name="name" id="field">

    <input type="text" name="surname" id="field">
    <input type="text" name="email" id="field">
    <input type="text" name="business" id="field">
    <input type="text" name="phone" id="field">
    <input type="text" name="password" id="field">
    <input type="text" name="confirm_password" id="field">
    <button type="submit" id="submit_button">Registreer</button>
</form>
</body>


</html>
