<?php session_start();

$page = 'product.php';
require 'includes/login.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
<?php include 'includes/nav.php' ?>

<main>
    <header>
        <h1>Ons product</h1>
    </header>

    <section class="video-description">

        <div class="video-box">
        <video class="video" autoplay muted loop>
            <source src="images/product-video.mp4" type="video/mp4">
        </video>
        </div>

    <section class="product-description-and-button">
        <h2>De Geldige Lift</h2>

        <p>
            De Geldige Lift is een innovatieve oplossing die speciaal is ontworpen voor mensen met mobiliteitsproblemen, zoals rolstoelgebruikers. In plaats van dat de gebruiker zich moet verplaatsen naar een vast pinapparaat op een onhandige hoogte, brengt deze lift het pinapparaat eenvoudig naar de juiste positie.
        </p>
        <p>
            Het systeem bestaat uit een verstelbare liftconstructie waarin een pinapparaat is gemonteerd. Met één druk op de knop kan het apparaat soepel omhoog of omlaag bewegen. Hierdoor kunnen zowel zittende als staande gebruikers het apparaat comfortabel bedienen, zonder zich te hoeven uitrekken of verplaatsen.
        </p>
        <p>
            De Geldige Lift draagt bij aan zelfstandigheid en inclusiviteit. Mensen in een rolstoel kunnen zelfstandig betalen, zonder hulp van anderen. Dit vergroot niet alleen het gemak, maar ook het gevoel van autonomie en waardigheid.
        </p>
        <p>
            Kortom, De Geldige Lift maakt dagelijkse handelingen toegankelijker voor iedereen en vormt een belangrijke stap richting een inclusievere samenleving.
        </p>

        <a href="#" class="order-button">Bestel nu!</a>
    </section>

    <?php require_once 'includes/login.php'; ?>
</main>

<footer>
    <div>
        <a href="#">algemene voorwaarden</a>
        <a href="#">privacy</a>
        <a href="#">cookies</a>
    </div>
    <div class="icons-copyright">
        <img src="images/icons.png" width="100">

        <p>© 2026 DeGeldigeLift</p>
    </div>
</footer>
</body>
</html>