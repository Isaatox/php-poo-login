<?php
function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

spl_autoload_register('chargerClasse');



include('conf.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Liste des utilisateurs</title>
</head>
<body>
<h1>Liste des types de livres</h1>
<table class="table">
    <thead>
        <th>ID</th>
        <th>email</th>
        <th>role</th>
    </thead>
    <tbody>
    <?php
    try {
        $db = new PDO($dsn, $dbname, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse
    
        
        $userManager = new UserManager($db);
        $users = $userManager->getList();
    
        foreach ($users as $user) {
            print('<td>'.$user->getId().'</td>');
            print('<td>'.$user->getEmail().'</td>');
            print('<td>'.$user->getRole().'</td>');
        }
    }
    catch (PDOException $e) {
        print('<br/>Erreur de connexion ' . $e->getMessage());
    }
    ?>
    </tbody>
</table>

       <a href="add.php" class="btn btn-primary">Ajouter un utilisateur</a>
</body>
</html>