<?php

/** Registratie validatie */
if(isset($_POST['register']) || isset($_POST['update'])) {

    /** Naam validatie */
    if (empty($_POST['name'])) {
        $errors['name'] = "Voornaam is verplicht";
    }

    if (empty($_POST['surname'])) {
        $errors['surname'] = "Achternaam is verplicht";
    }


    /** E-mail validatie */
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is verplicht";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Ongeldige email";
    }

    if (empty($_POST['business'])) {
        $errors['business'] = "Een bedrijf is verplicht";
    }

}
if(isset($_POST['register'])) {
    /** Wachtwoord validatie */
    if (empty($_POST['password'])) {
        $errors['password'] = "Wachtwoord verplicht";
    } else if (strlen($_POST['password']) < 8) {
        $errors['password'] = "Wachtwoord moet 8 karakters lang zijn";
    } else if (!preg_match('/[0-9]/', $_POST['password'])) {
        $errors['password'] = "Minstens één cijfer";
    } else if (!preg_match('/[A-Z]/', $_POST['password'])) {
        $errors['password'] = "Minstens één hoofdletter";
    } else if (!preg_match('/[!@#$%^&*,.?:]/', $_POST['password'])) {
        $errors['password'] = "Wachtwoord moet minstens één speciaal teken bevatten";
    } else if (preg_match('/[[<>{}()]"]/', $_POST['password'])) {
        $errors['password'] = "Ongeldig teken";
    } else if (str_contains($_POST['password'], ' ')) {
        $errors['password'] = "Wachtwoord mag geen spaties bevatten";
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['confirm_password'] = "Wachtwoorden komen niet overeen";
    }

    if (preg_match('/a-zA-Z/', $_POST['phone'])) {
        $errors['phone'] = "Ongeldig telefoonnummer";
    } else if (preg_match('/[[<>(){}"!@#$%^&*()_=:,.]/', $_POST['phone'])) {
        $errors['phone'] = "Ongeldig telefoonnummer";
    }
}

if (isset($_POST['submit'])) {
    if (empty($_POST['user'])) {
        $errors['user'] = "E-mail is verplicht";
    }

    if(!filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)) {
        $errors['user'] = "Ongeldige email";
    }

    if(empty($_POST['password'])) {
        $errors['password'] = "Wachtwoord verplicht";
    }

}


if (isset($_POST['contact-submit'])) {
    if (empty($_POST['firstName'])) {
        $errors['name'] = "Voornaam is verplicht";
    }

    if (empty($_POST['lastName'])) {
        $errors['surname'] = "Achternaam is verplicht";
    }

    if (empty($_POST['email'])) {
        $errors['user'] = "E-mail is verplicht";
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['user'] = "Ongeldige email";
    }

    if(empty($_POST['address'])) {
        $errors['address'] = "!";
    }

    if(empty($_POST['houseNumber'])) {
        $errors['houseNumber'] = "!";
    }

    if(empty($_POST['zipcode'])) {
        $errors['zipcode'] = "!";
    }

    if(empty($_POST['city'])) {
        $errors['city'] = "!";
    }

    if(empty($_POST['question'])) {
        $errors['question'] = "!";
    }
}