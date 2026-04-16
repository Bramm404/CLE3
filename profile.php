<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: index.php');
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require_once 'includes/nav.php';?>
<main>
    <header>
        <h1>Profile</h1>
    </header>

    <h2>Onze doelen</h2>

    <a href="logout.php">Log uit</a>
</main>

<footer>
    <div>
        <a href="#">algemene voorwaarden</a>
        <a href="#">privacy</a>
        <a href="#">cookies</a>
    </div>
    <div class="icons-copyright">
        <img src="#" alt="logo instagram">
        <img src="#" alt="logo facebook">
        <img src="#" alt="logo twitter">

        <p>@Our Product</p>
    </div>
</footer>
</body>
</html>