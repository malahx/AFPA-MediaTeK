<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Util\Serializer;
use App\Controller\Auth;

class Borrow {
protected $ci;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    function myBorrows($request, $response, $args) {
        global $em;

        if (!Auth::isLogged()) {
            return $response->withStatus(401);
        }

        $user_id = Auth::getUserId();

        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');

        $books = $repoBook->findAllBorrowed($user_id);
        $cds = $repoCd->findAllBorrowed($user_id);
        $comics = $repoComic->findAllBorrowed($user_id);
        
        $docs = array_merge($books, $cds, $comics);
        
        return $response->withJson(Serializer::objToArray($docs), 200);
    }

    
    function borrows($request, $response, $args) {
        global $em;

        if (!Auth::isAdmin()) {
            return $response->withStatus(401);
        }

        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');

        $books = $repoBook->findAllBorrowed();
        $cds = $repoCd->findAllBorrowed();
        $comics = $repoComic->findAllBorrowed();
        
        $docs = array_merge($books, $cds, $comics);
        
        return $response->withJson(Serializer::objToArray($docs), 200);
    }
}
