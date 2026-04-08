<nav>
    <img src="#" alt="logo">
    <div>
        <a href="index.php">Home</a>
        <a href="product.php">Ons product</a>
        <a href="about.php">Over ons</a>
        <?php if (!isset($_SESSION['login'])) { ?>
            <button class="log-in-button" id="loginBtn">Log in</button>
        <?php } else {?>
            <a href="profile.php" id="profileBtn">Mijn profiel</a>
        <?php } ?>
    </div>
</nav>