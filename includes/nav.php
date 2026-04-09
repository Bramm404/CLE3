<nav>
    <img src="images/logo.png" alt="logo">
    <div>
        <a href="index.php">Home</a>
        <a href="product.php">Ons product</a>
        <a href="about.php">Over ons</a>
        <?php if (!isset($_SESSION['login'])) { ?>
            <a class="log-in-button" id="loginBtn" tabindex="0">Log in</a>
        <?php } else {?>
            <a href="profile.php" class='log-in-button' tabindex="0">Mijn profiel</a>
        <?php } ?>
    </div>
</nav>