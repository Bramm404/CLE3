<?php
session_start();
/** @var $db */
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
$telephone = $row['phone'];

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $surname = mysqli_real_escape_string($db,$_POST['surname']);
    $business = mysqli_real_escape_string($db,$_POST['business']);
    $telephone = mysqli_real_escape_string($db,$_POST['phone']);

    require_once 'includes/formvalidator.php';

    if(empty($errors)) {
        $query = "UPDATE users SET name = '$name', surname = '$surname', business_name = '$business', phone = '$telephone' WHERE email = '$user' ";
        mysqli_query($db, $query);

        $query = "SELECT * FROM users WHERE email = '$user'";
        $result = mysqli_query($db, $query);

        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $surname = $row['surname'];
        $business = $row['business_name'];
        $telephone = $row['phone'];



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
</head>
<body>
<?php require_once 'includes/nav.php';?>
<main>
    <header>
        <h1>Profiel</h1>
    </header>

    <h2>Onze doelen</h2>

                    <div class="field-update-div">
                        <label for="phone">Telefoonnummer</label>
                        <div class="inputError">
                            <input type="text" name="phone" id="phone" class="field" value="<?= $telephone ?? '' ?>">
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