<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>De Geldige Lift</title>
    <link rel="stylesheet" href="css/style.css">
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
        <a href="#" class="log-in-button" id="loginBtn">Log in</a>
    </div>
</nav>

<main>
    <header>
        <!--        <img src="images/leafs.png">-->
        <h1>De Geldige Lift</h1>
    </header>

    <section class="product-preview">
        <div>
            <h2>Ons product</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum consequat ligula, vitae bibendum enim vestibulum ac. Ut posuere libero diam, pretium malesuada nibh pharetra in. Phasellus at ante justo. Duis eu nisi non mauris ultrices condimentum. In posuere augue sed metus tincidunt, a vulputate urna sodales. Cras hendrerit ullamcorper lorem, sit amet tincidunt sem luctus in. Sed efficitur nisi non quam ultricies, id mattis sem malesuada. Donec luctus placerat sollicitudin. Phasellus nec neque et leo condimentum auctor commodo nec ligula.</p>
            <a href="#">Ga naar pagina</a>
        </div>

        <img src="images/sketch.jpg">
    </section>

    <section class="form">
        <h2>Contact</h2>
        <p>Heeft u een vraag? Neem dan contact met ons op:</p>

        <form>
            <div class="details">
                <div class="first-name-last-name">
                    <label for="firstName">voornaam</label>
                    <input type="text" id="firstName" name="firstName">

                    <label for="lastName">achternaam</label>
                    <input type="text" id="lastName" name="lastName">
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
        <div>
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