<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Util\Serializer;
use App\Repository\BorrowRepository;

class Document {

    protected $ci;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    function news($request, $response, $args) {
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
    
    function document($request, $response, $args) {
        global $em;
        
        $id = (int)$args['id'];
        
        $repoDocument = $em->getRepository('App\Entity\Document');
        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');
        $repoBorrow = $em->getRepository('App\Entity\Borrow');
        
        $document = $repoDocument->findOneBy(array('id' => $id));
        $book = $repoBook->findOneBy(array('document' => $document));
        $cd = $repoCd->findOneBy(array('document' => $document));
        $comic = $repoComic->findOneBy(array('document' => $document));
        $borrow = $repoBorrow->findActiveBy($id);
        
        $doc = ($book ? $book : ($cd ? $cd : $comic));

        if ($borrow) {
            $doc->setBorrow($borrow[0]);
        }
        
        return $response->withJson($doc ? $doc->toArray() : $document->toArray(), 200);
    }
    
    function catalog($request, $response, $args) {
        global $em;

        $repoBook = $em->getRepository('App\Entity\Book');
        $repoCd = $em->getRepository('App\Entity\Cd');
        $repoComic = $em->getRepository('App\Entity\Comic');

        $books = BorrowRepository::setBorrows($repoBook, $repoBook->findAll());
        $cds = BorrowRepository::setBorrows($repoCd, $repoCd->findAll());
        $comics = BorrowRepository::setBorrows($repoComic, $repoComic->findAll());

        $docs = array_merge($books, $cds, $comics);
        
        return $response->withJson(Serializer::objToArray($docs), 200);
    }
}
