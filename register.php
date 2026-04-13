<?php
/** @var $db */
session_start();


if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

$errors = [];

if (isset($_POST['register'])) {
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

    if(!empty($_POST['phone'])) {
        $query = "SELECT * FROM users WHERE phone = '$phone'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $errors['phone'] = "Dit telefoon nummer is al gelinked aan een account.";
        }
    }

    if(empty($errors)) {
        $hashword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, surname, email, password, business_name, phone) VALUES ('$name', '$surname', '$email', '$hashword', '$business', '$phone')";

        if(mysqli_query($db, $query)) {
            header('Location: index.php');
            exit;
        } else {
            $errors['db'] = 'Er is iets fout gegaan met het toevoegen van het account.';
        }

        header('Location: index.php');
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
    <title> De Geldige Lift - Registreren </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/register.js" defer></script>
    <script src="js/main.js" defer></script>
</head>
<body>

<?php require_once "includes/nav.php"; ?>

<header>
    <h1>Registreer</h1>
</header>

<p><?= $errors['db'] ?? ''?></p>
<main>
    <section>
        <form id="form" action="" method="post">
            <div class="fieldDiv">
                <label for="name">Voornaam*</label>
                <div class="inputError">
                    <input type="text" name="name" id="name" class="field" value="<?= $name ?? ''?>">
                    <p class="error"><?= $errors['name'] ?? '' ?></p>
                </div>
            </div>

            <div class="fieldDiv">
                <label for="surname">Achternaam*</label>
                <div class="inputError">
                    <input type="text" name="surname" id="surname" class="field" value="<?= $surname ?? ''?>">
                    <p class="error"><?= $errors['surname'] ?? '' ?></p>
                </div>
            </div>

            <div class="fieldDiv">
                <label for="email">E-Mail*</label>
                <div class="inputError">
                    <input type="text" name="email" id="email" class="email" value="<?= $email ?? ''?>">
                    <p class="error"> <?=$errors['email'] ?? '' ?> </p>
                </div>
            </div>


            <div class="fieldDiv">
                <label for="business">Bedrijf*</label>
                <div class="inputError">
                    <input type="text" name="business" id="business" class="field" value="<?= $business ?? '' ?>">
                    <p class="error"><?=$errors['business'] ?? ''?></p>
                </div>
            </div>

            <div class="fieldDiv">
                <label for="password">Wachtwoord*</label>
                <div class="inputError">
                    <input type="password" name="password" id="password" class="field">
                    <p class="error"> <?= $errors['password'] ?? ''?></p>
                </div>
            </div>

            <div class="fieldDiv">
                <label for="confirm_password">Wachtwoord bevestigen*</label>
                <div class="inputField"></div>
                <input type="password" name="confirm_password" id="confirm_password" class="field">
                <p class="error"> <?= $errors['confirm_password'] ?? ''?></p>

                <div id="checklist">
                    <p>Het wachtwoord moet het volgende bevatten:</p>
                    <p id="length">x 8 tekens lang</p>
                    <p id="capital">x 1 hoofdletter</p>
                    <p id="number">x 1 cijfer</p>
                    <p id="spec">x 1 speciaal teken</p>
                </div>
            </div>

            <div class="fieldDiv">
                <label for="phone">Telefoonnummer</label>
                <div class="inputError">
                    <input type="text" name="phone" id="phone" class="field" value="<?= $phone ?? '' ?>">
                    <p class="error"> <?= $errors['phone'] ?? ''?></p>
                </div>
            </div>



            <button type="submit" name="register" id="submitBtn">Registreer</button>
        </form>
    </section>

    <?php require_once 'includes/login.php'?>

</main>

<footer>
    <div>
        <a href="#">algemene voorwaarden</a>
        <a href="#">privacy</a>
        <a href="#">cookies</a>
    </div>
    <div class="icons-copyright">
        <img src="#">
        <img src="#">
        <img src="#">

        <p>@DeGeldigeLift</p>
    </div>
</footer>
</body>
</html>

</body>
</html>
