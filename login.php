<?php
/** @var  $db */

$login = false;

if (isset($_SESSION['login'])) {
    $login = true;
}

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