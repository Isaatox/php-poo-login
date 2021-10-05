<?php

namespace App\Manager;

use PDO;
use Exception;
use App\Entity\User;

class UserManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }

    public function setDB(PDO $db): UserManager
    {
        $this->_db = $db;
        return $this;
    }

    public function add(User $user): bool
    {
        $result = false;
        try {
            $query = $this->_db->prepare('INSERT INTO users (`email`, `password`) VALUES (:email, :`password`);');
            print_r($query);
            $query->bindValue(':email', $user->getEmail());
            $query->bindValue(':password', $user->getPassword());
            $result = $query->execute();
        } catch (Exception $e) {
            print("UNe erreur est intervenue : '".$e->getMessage()."'");
        }
        return result;
    }

    public function delete(User $user): bool
    {
        //Execute une requête de type delete
    }

    public function getAll(): array
    {
        $listeUser = array();
        //Retourne la liste de tous les pers
        $request = $this->_db->query('SELECT * FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée
        {
            $user = new User($ligne);
            $listeUser[] = $user;
        }
        return $listeUser;
    }

    public function update(Personnage $perso): bool
    {
        //Execute une requête de type UPDATE
    }
}
