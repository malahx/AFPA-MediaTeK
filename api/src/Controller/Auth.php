<?php

namespace App\Controller;

use App\Util\Serializer;

class Auth {
    
    protected $ci;

    public static function isLogged() {
        return isset($_SESSION['userid']) && $_SESSION['userid'] != null;
    }

    public static function isAdmin() {
        return isset($_SESSION['admin']) && $_SESSION['admin'];
    }

    public static function getUserId() {
        return Auth::isLogged() ? $_SESSION['userid'] : null;
    }

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    function login($request, $response, $args) {
        global $em;
        
        $username = $request->getParam('_username');
        $password = $request->getParam('_password');
        
        if (!$username || !$password) {
            return $response->withStatus(401);
        }

        $repoBook = $em->getRepository('App\Entity\User');

        $user = $repoBook->findOneBy(array('username' => $username));

        if (!$user || !password_verify($password, $user->getPassword())) {
            return $response->withStatus(401);
        }

        $_SESSION['userid'] = (int) $user->getId();

        if ($user->getRoles() == array("ROLE_ADMIN")) {
            $_SESSION['admin'] = true;
        }
        
        return $response->withJson($user->toArray(), 200);
    }
}
