<?php
include('header.php');

try {
    $db = new PDO($dsn, $dbname, $dbpass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $userManager = new UserManager($db);

    if ($_POST) {
        if (isset($_POST['email']) && !empty($_POST['email'])) {

            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            if ($userManager->add($user)) {
                $_SESSION['message'] = "Utilisateur ajouté";
            } else {
                $_SESSION['error'] = "Une erreur est intervenue";
            };

            header('Location: list.php');
        } else {
            $_SESSION['error'] = "Le formulaire est incomplet";

            header('Location: list.php');
        }
    }
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>Ajouter</title>
</head>
<body>
<main class="form-signin">
    <form method="POST">
        <h1 class="h3 mb-3 fw-normal">Inscrire</h1>

        <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary" type="submit">S'inscrire</button>
    </form>
</body>
</html>