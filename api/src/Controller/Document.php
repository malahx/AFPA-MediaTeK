<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Util\Serializer;

class Document {

    protected $ci;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    function news($request, $response, $args) {
        global $em;

        $date = new DateTime();
        $date->sub(new DateInterval('P1M'));

        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');

        $books = $repoBook->findAllAfter($date);
        $cds = $repoCd->findAllAfter($date);
        $comics = $repoComic->findAllAfter($date);
        $document = array_merge($books, $cds, $comics);
        
        return $response->withJson(Serializer::objToArray($document), 200);
    }

}
