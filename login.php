<?php
/** @var  $db */

$login = false;

if (isset($_SESSION['login'])) {
    $login = true;
}

$errors = [];

if(isset($_POST['submit'])) {
    require_once 'includes/db.php';
    $user = mysqli_real_escape_string($db, $_POST['user']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);
    require_once 'includes/formvalidator.php';

    if(empty($errors)) {
        $query = "SELECT * FROM users WHERE email = '$user'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) === 1) {

            $client = mysqli_fetch_assoc($result);
            $hash = $client['password'];

            if (password_verify($pass, $hash)) {
                $_SESSION['login'] = true;
                $_SESSION['email'] = $client['email'];
                $_SESSION['name'] = $client['name'];
                $_SESSION['surname'] = $client['surname'];


                header('Location: index.php');
                exit;
            } else {
                $errors['password'] = "Wachtwoord is onjuist";
            }
        } else {
            $errors['user'] = "Geen gebruiker gevonden";
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
    <title> Login </title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/register.js" defer></script>
</head>
<body>

<main>

    <form action="" method="post">
        <div>
            <label for="user">E-Mail</label>
            <input type="text" name="user" class="field" id="name" value="<?= $user ?? ''?>">
            <p class="error"> <?= $errors['user'] ?? ''?></p>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" class="field" id="password">
            <p class="error"> <?= $errors['password'] ?? ''?></p>
        </div>

        <button type="submit" name="submit">Log in</button>

    </form>
</main>


</body>
