<?php
session_start();
$page = 'index.php';
require_once 'includes/login.php';

$errors = [];


if (isset($_POST['contact-submit'])) {
    /** @var $db */

    require_once 'includes/db.php';
    $name = mysqli_real_escape_string($db, $_POST['firstName']) ;
    $surname = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']) ;
    $address = mysqli_real_escape_string($db, $_POST['address']) ;
    $housenum = mysqli_real_escape_string($db, $_POST['houseNumber']);
    $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
    $city = mysqli_real_escape_string($db,$_POST['city']);
    $question = mysqli_real_escape_string($db, $_POST['question']);

    require_once "includes/formvalidator.php";

        if(empty($errors)) {

            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                $userid = mysqli_fetch_assoc($result)['id'];
            } else {
                $userid = NULL;
            }

            $fulladdress = ($address . ' ' . $housenum . ', ' . $zipcode . ', ' . $city);
            $query = "INSERT INTO messages (user, name, surname, email, address, message) VALUES ('$userid', '$name', '$surname', '$email', '$fulladdress', '$question')";


            mysqli_query($db, $query);
            mysqli_close($db);


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
<?php include 'includes/nav.php' ?>

<header class="hero">
    <h1 class="home-page-h1">De Geldige Lift</h1>
    <div class="video-section">
        <canvas id="myCanvas"></canvas>
        <video style="display:none;" src="videos/scroll-video0001-0120.mp4" alt="Een animatie van het product dat omhoog en naar beneden gaat als je scrollt"></video>
    </div>
</header>

<main>

    <section class="product-preview">
        <div>
            <h2>Ons product</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum consequat ligula, vitae
                bibendum enim vestibulum ac. Ut posuere libero diam, pretium malesuada nibh pharetra in. Phasellus at
                ante justo. Duis eu nisi non mauris ultrices condimentum. In posuere augue sed metus tincidunt, a
                vulputate urna sodales. Cras hendrerit ullamcorper lorem, sit amet tincidunt sem luctus in. Sed
                efficitur nisi non quam ultricies, id mattis sem malesuada. Donec luctus placerat sollicitudin.
                Phasellus nec neque et leo condimentum auctor commodo nec ligula.</p>
            <a href="#">Ga naar pagina</a>
        </div>

    </section>

    <section class="form-section">
        <h2>Contact</h2>
        <p>Heeft u een vraag? Neem dan contact met ons op:</p>

        <form method="POST">
            <div class="form-details">
                <div id="leftSide">
                    <div class="first-name-last-name">
                        <div class="form-field-div">
                            <label for="firstName">Voornaam*</label>
                            <input type="text" id="firstName" name="firstName" value="<?= $_SESSION['name'] ?? '' ?>" placeholder="<?= $errors['firstName'] ?? '' ?>">
                        </div>

                        <div class="form-field-div">
                            <label for="lastName">Achternaam*</label>
                            <input type="text" id="lastName" name="lastName" value="<?= $_SESSION['surname'] ?? '' ?>" placeholder="<?= $errors['lastName'] ?? '' ?>">
                        </div>
                    </div>

                    <div class="form-field-div">
                        <label for="email">E-mailadres*</label>
                        <input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?? '' ?>" placeholder="<?= $errors['email'] ?? '' ?>">
                    </div>

                    <div class="address-home-number">

                        <div class="form-field-div">
                            <label for="address">Straat en Huisnummer*</label>
                            <div class="doubleField">
                                <input type="text" id="Address" name="address" placeholder="<?= $errors['address'] ?? '' ?>">
                                <input type="text" id="shortInput" name="houseNumber" placeholder="<?= $errors['houseNumber'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="form-field-div">
                            <label for="city">Postcode en Stad*</label>
                            <div class="doubleField">
                                <input type="text" id="shortInput" name="zipcode" placeholder="<?= $errors['zipcode'] ?? '' ?>">
                                <input type="text" id="city" name="city" placeholder="<?= $errors['city'] ?? '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="rightSide">
                    <div class="question-text-area form-field-div">
                        <label for="question">Uw vraag</label>
                        <textarea id="question" name="question"></textarea>
                    </div>

                    <button type="submit" name="contact-submit" class="submit-btn">Versturen</button>
                </div>
            </div>
        </form>
    </section>

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