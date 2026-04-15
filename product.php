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

    <img src="#">

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum consequat ligula, vitae bibendum enim vestibulum ac. Ut posuere libero diam, pretium malesuada nibh pharetra in. Phasellus at ante justo. Duis eu nisi non mauris ultrices condimentum. In posuere augue sed metus tincidunt, a vulputate urna sodales. Cras hendrerit ullamcorper lorem, sit amet tincidunt sem luctus in. Sed efficitur nisi non quam ultricies, id mattis sem malesuada. Donec luctus placerat sollicitudin. Phasellus nec neque et leo condimentum auctor commodo nec ligula. Donec nec eros condimentum, dignissim ex in, posuere lacus. Nulla tempus quam at volutpat luctus. Aliquam interdum aliquet lectus, eu commodo est mollis et.</p>

    <p>Sed tempus augue et metus feugiat, ut luctus massa placerat. Vestibulum molestie pretium lobortis. Donec ut ornare leo. Cras eget ornare erat. Vivamus et purus et lacus ornare maximus. Proin ut purus in quam rutrum ultricies. Suspendisse eget purus molestie, dictum ligula at, sodales felis. Morbi in lorem nec tellus molestie ultricies. Ut vestibulum turpis lectus, id iaculis nibh tempor ut. Sed in est sem. Aenean et rhoncus tortor, vulputate pretium odio.</p>

    <p>Maecenas commodo velit nec tristique mattis. Morbi eu arcu purus. Suspendisse pulvinar lacus id urna imperdiet pharetra. In semper rutrum erat, vitae volutpat magna euismod a. Suspendisse accumsan sollicitudin lacus, ac porttitor nisl lobortis in. Vestibulum eros risus, molestie ac eros vitae, vulputate luctus nisi. Aenean vestibulum id augue bibendum malesuada. Suspendisse luctus magna vitae vestibulum consectetur. Phasellus malesuada pulvinar purus. Duis dictum facilisis nisl fringilla fermentum. Proin tincidunt ex sit amet tellus eleifend hendrerit. Praesent vitae tristique nisi. Proin convallis egestas velit, accumsan efficitur libero dapibus in. Maecenas sagittis interdum tellus non molestie. Maecenas ut nibh vitae tortor congue aliquam.</p>

    <?php require_once 'includes/login.php'; ?>
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

        <p>@Our Product</p>
    </div>
</footer>
</body>
</html>