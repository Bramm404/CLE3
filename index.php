<?php
/** @var $db */

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


            } else {
                $errors['password'] = "Wachtwoord is onjuist";
            }
        } else {
            $errors['user'] = "Geen gebruiker gevonden";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>De Geldige Lift</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
<nav>
    <img src="#">
    <div>
        <a href="index.php">Home</a>
        <a href="product.php">Ons product</a>
        <a href="about.php">Over ons</a>
        <a href="profile.php">Mijn profiel</a>

        <?php if (!isset($_SESSION['login'])) { ?>
        <button class="log-in-button" id="loginBtn">Log in</button>
        <?php } else {?>
        <a href="profile.php" class="log-in-button">Mijn profiel</a>
        <?php } ?>
    </div>
</nav>

<header class="hero">
    <h1 class="home-page-h1">De Geldige Lift</h1>
</header>

<main>
    <section class="product-preview">
        <div>
            <h2>Ons product</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum consequat ligula, vitae bibendum enim vestibulum ac. Ut posuere libero diam, pretium malesuada nibh pharetra in. Phasellus at ante justo. Duis eu nisi non mauris ultrices condimentum. In posuere augue sed metus tincidunt, a vulputate urna sodales. Cras hendrerit ullamcorper lorem, sit amet tincidunt sem luctus in. Sed efficitur nisi non quam ultricies, id mattis sem malesuada. Donec luctus placerat sollicitudin. Phasellus nec neque et leo condimentum auctor commodo nec ligula.</p>
            <a href="#">Ga naar pagina</a>
        </div>

        <img src="images/sketch.jpg">
    </section>

    <section class="form-section">
        <h2>Contact</h2>
        <p>Heeft u een vraag? Neem dan contact met ons op:</p>

        <form>
            <div class="details">
                <div class="first-name-last-name">

                    <label for="firstName">voornaam</label>
                    <input type="text" id="firstName" name="firstName" value="<?php if(isset($_SESSION['login'])) {echo $_SESSION['name'];} else {echo ''; } ?>">

                    <label for="lastName">achternaam</label>
                    <input type="text" id="lastName" name="lastName" value="<?php if(isset($_SESSION['login'])) {echo $_SESSION['surname'];} else {echo ''; } ?>">
                </div>

                <label for="email">emailadres</label>
                <input type="email" id="email" name="email">

                <div class="address-home-number">
                    <label for="address">adres en huisnummer</label>
                    <input type="text" id="address" name="address">

                    <label for="city">postcode en stad</label>
                    <input type="text" id="city" name="city">
                </div>
            </div>

            <div class="question-text-area">
                <label for="question">uw vraag</label>
                <textarea id="question" name="question"></textarea>
            </div>

            <button type="submit" class="submit-btn">Versturen</button>
        </form>
    </section>

    <section>
        <dialog>
        <div id="loginContainer">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="fieldDiv">
                    <label for="user">E-Mail</label>
                    <input type="text" name="user" class="field" id="name" value="<?= $user ?? ''?>">
                        <p class="error"> <?= $errors['user'] ?? ''?></p>
                </div>

                <div class="fieldDiv">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="field" id="password">
                        <p class="error"> <?= $errors['password'] ?? ''?></p>
                </div>

                <button type="submit" name="submit" id="popupBtn">Log in</button>

            </form>
            <div id="registerDiv">
                <p>Nog geen account?</p>
                <a href="register.php">Registreer nu!</a>
            </div>
        </div>
        </dialog>
    </sectioN>

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