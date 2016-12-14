<?php

require_once(dirname(__FILE__).'/dao.inc.php');
require_once(dirname(__FILE__).'/../model/User.class.php');

class userDAO {

    static function getAll() {
        $bdd = dao::connect();
        $select = $bdd->prepare('SELECT * FROM user');
        $select->execute();
        return self::toArray($select);
    }

    private static function toArray($select) {
        if (!$select) {
            return -1;
        }
        $users = array();
        while ($data = $select->fetch()) {
            $user = new User($data);
            array_push($users, $user);
        }
        return $users;
    }
    
    static function getByName($name) {
        $bdd = dao::connect();
        $select = $bdd->prepare('SELECT * FROM user WHERE username = :username');
        $select->bindValue(":username", $name);
        $select->execute();
        if (!$select) {
            return -1;
        }
        $data = $select->fetch();
        if (empty($data)) {
            return -1;
        }
        $user = new User ($data);
        return $user;
    }

    static function insert($user) {
        $bdd = dao::connect();
        $insert = $bdd->prepare('INSERT INTO `user` (username, email, password) VALUES (:name, :email, :password)');
        $insert->bindValue("name", $user->getName());
        $insert->bindValue("email", $user->getEmail());
        $insert->bindValue("password", $user->getPassword());
        $insert->execute();
        if (!$insert) {
            return -1;
        }

        return $bdd->lastInsertId();
    }
}
