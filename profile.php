<?php
session_start();

/** @var $db */

$errors = [];

if(!isset($_SESSION['login'])) {
    header('Location: index.php');
}

require_once 'includes/db.php';

$user = $_SESSION['email'];


$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$surname = $row['surname'];
$business = $row['business_name'];
$telephone = $row['phone'] || null;

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $surname = mysqli_real_escape_string($db,$_POST['surname']);
    $business = mysqli_real_escape_string($db,$_POST['business']);
    $telephone = mysqli_real_escape_string($db,$_POST['phone']);

    require_once 'includes/formvalidator.php';

    if(empty($errors)) {
        $query = "UPDATE users SET name = '$name'. surname = '$surname', business_name = '$business', phone = '$telephone' WHERE email = '$user' ";
        mysqli_query($db, $query);

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
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php require_once 'includes/nav.php';?>
<main>
    <header>
        <h1>Profile</h1>
    </header>

    <section class="information">
        <form method="post">
            <div class="horizontal-layer-form">
                <div class="vertical-layer-form">
                    <div class="field-update-div">
                        <label for="name">Voornaam*</label>
                        <div class="inputError">
                            <input type="text" name="name" id="name" class="field" value="<?= $name ?? '' ?>">
                            <p class="error"><?= $errors['name'] ?? '' ?></p>
                        </div>
                    </div>

                    <div class="field-update-div">
                        <label for="surname">Achternaam*</label>
                        <div class="inputError">
                            <input type="text" name="surname" id="surname" class="field" value="<?= $surname ?? '' ?>">
                            <p class="error"><?= $errors['surname'] ?? '' ?></p>
                        </div>
                    </div>
                </div>

                <div class="vertical-layer-form">
                    <div class="field-update-div">
                        <label for="business">Bedrijf*</label>
                        <div class="inputError">
                            <input type="text" name="business" id="business" class="field" value="<?= $business ?? '' ?>">
                            <p class="error"><?=$errors['business'] ?? ''?></p>
                        </div>
                    </div>


                    <div class="field-update-div">
                        <label for="phone">Telefoonnummer</label>
                        <div class="inputError">
                            <input type="text" name="phone" id="phone" class="field" value="<?= $phone ?? '' ?>">
                            <p class="error"> <?= $errors['phone'] ?? ''?></p>
                        </div>
                    </div>
                </div>
            </div>



            <button type="submit" name="update" id="updateBtn">Update</button>
        </form>
    </section>

    <a href="logout.php" id="log-out-btn">Log uit</a>
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