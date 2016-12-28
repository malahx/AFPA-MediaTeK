<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Util\Serializer;

class Borrow {
protected $ci;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    function login($request, $response, $args) {
        global $em;

        $date = new DateTime();
        $date->sub(new DateInterval('P2M'));

        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');

        $books = $repoBook->findAllAfter($date);
        $cds = $repoCd->findAllAfter($date);
        $comics = $repoComic->findAllAfter($date);
        
        $docs = array_merge($books, $cds, $comics);
        
        return $response->withJson(Serializer::objToArray($docs), 200);
    }
}
