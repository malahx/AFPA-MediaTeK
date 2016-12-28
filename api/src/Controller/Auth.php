<?php

namespace App\Controller;

use App\Util\Serializer;

class Auth {
    
    protected $ci;

    public static function isLogged() {
        return $_SESSION['userid'] != null;
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
        
        return $response->withJson($user->toArray(), 200);
    }
}
