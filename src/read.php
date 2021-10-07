<?php
require_once '../vendor/autoload.php';

use PDO;
use Monolog\Logger;
use Twig\Environment;
use App\Manager\UserManager;
use Twig\Loader\FilesystemLoader;
use Monolog\Handler\StreamHandler;


$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::DEBUG));

$loader = new \Twig\Loader\FilesystemLoader('../templates');

$twig = new \Twig\Environment($loader, [
'cache' => '../cache',
]);

require_once("header.php");

try {
    $db = new PDO($dsn, $dbname, $dbpass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse

    $manager = new UserManager($db);

    echo $twig->render('user/read.html.twig',
        [
            'msg_danger' => '',
            'msg_success' => '',
            'title' => 'Liste de l\'utilisateur',
            'user' => $manager->getOne($_GET['id']),
        ]
    );
}
catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}