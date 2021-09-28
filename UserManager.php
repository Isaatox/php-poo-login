<?php

class UserManager {
    private $_db;

    public function __construct(PDO $db){
        $this->setDB($db);
    }

    public function setDB(PDO $db): UserManager {
        $this->_db = $db;
        return $this;
    }

    public function add(User $user):bool {
        //Préparation de la requête d'insertion
        //Assignation des valeurs pour le nom, la force ...
        //Exécution de la requête
        $query = $this->_db->prepare('INSERT INTO users (`email`, `password`) VALUES (:email, :`password`);');
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        return $query->execute();
    }
    
    
    public function delete(User $user):bool {
        //Execute une requête de type delete
    }

    public function getList():array {
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

    public function update(Personnage $perso):bool {
        //Execute une requête de type UPDATE
    }
}