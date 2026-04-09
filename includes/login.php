<?php
/** @var $db */
if (isset($_SESSION['login'])) {
    $login = true;
}

$errors = [];

if (isset($_POST['submit'])) {
    require_once 'includes/db.php';
    $user = mysqli_real_escape_string($db, $_POST['user']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);
    require_once 'includes/formvalidator.php';

    if (empty($errors)) {
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

                header('Location: index.php');
                exit;
            } else {
                $errors['password'] = "Wachtwoord is onjuist";
            }
        } else {
            $errors['user'] = "Geen gebruiker gevonden";
        }
    }
}
?>


<section>
    <dialog>
        <div id="loginContainer">
            <button type="button" class="close-dialog" aria-label="Login blad sluiten" tabindex="0">×</button>
            <h2>Login</h2>
            <form action="" method="post">
                <div class="fieldDiv">
                    <label for="user">E-mail</label>
                    <input type="text" name="user" class="field" id="name" value="<?= $user ?? '' ?>">
                    <p class="error"> <?= $errors['user'] ?? '' ?></p>
                </div>

                <div class="fieldDiv">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="field" id="password">
                    <p class="error"> <?= $errors['password'] ?? '' ?></p>
                </div>
                <button type="submit" name="submit" id="submitBtn">Log in</button>
            </form>
            <div id="registerDiv">
                <p>Nog geen account?</p>
                <a href="register.php">Registreer nu!</a>
            </div>
        </div>
    </dialog>
</section>

