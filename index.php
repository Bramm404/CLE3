<?php
session_start();
if (isset($_POST['contactsubmit'])) {

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
            <div class="form-details">
                <div class="first-name-last-name">
                    <div class="form-field-div">
                        <label for="firstName">voornaam</label>
                        <input type="text" id="firstName" name="firstName" value="<?php if(isset($_SESSION['login'])) {echo $_SESSION['name'];} else {echo ''; } ?>">
                    </div>

                    <div class="form-field-div">
                        <label for="lastName">achternaam</label>
                        <input type="text" id="lastName" name="lastName" value="<?php if(isset($_SESSION['login'])) {echo $_SESSION['surname'];} else {echo ''; } ?>">
                    </div>
                </div>

                <div class="form-field-div">
                    <label for="email">emailadres</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="address-home-number">
                    <div class="form-field-div">
                        <label for="address">adres en huisnummer</label>
                        <input type="text" id="address" name="address">
                    </div>

                    <div class="form-field-div">
                        <label for="city">postcode en stad</label>
                        <input type="text" id="city" name="city">
                    </div>
                </div>
            </div>

            <div class="question-text-area form-field-div">
                <label for="question">uw vraag</label>
                <textarea id="question" name="question"></textarea>
            </div>

            <button type="submit" name="contactsubmit" class="submit-btn">Versturen</button>
        </form>
    </section>

    <?php require_once 'includes/login.php' ?>
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