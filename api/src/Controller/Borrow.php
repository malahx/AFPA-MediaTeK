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

    function resa($request, $response, $args) {
        global $em;

        if (!Auth::isLogged()) {
            return $response->withStatus(401);
        }

        $id = (int)$args['id'];

        $repoDocument = $em->getRepository('App\Entity\Document');
        $repoBorrow = $em->getRepository('App\Entity\Borrow');
        $repoUser = $em->getRepository('App\Entity\User');

        $document = $repoDocument->findOneBy(array('id' => $id));
        $borrows = $repoBorrow->findActiveBy($id);
        
        if ($borrows || !$document) {
            return $response->withStatus(409);
        }

        $user_id = Auth::getUserId();

        $user = $repoUser->findOneBy(array('id' => $user_id));

        $borrow = new \App\Entity\Borrow(new DateTime(), $document, $user);

        $em->persist($borrow);
        $em->flush();
        
        return $response->withJson($borrow->toArray(), 200);
    }

    function borrow($request, $response, $args) {
        global $em;

        if (!Auth::isAdmin()) {
            return $response->withStatus(401);
        }

        $id = (int)$args['id'];

        $repoBorrow = $em->getRepository('App\Entity\Borrow');

        $borrow = $repoBorrow->findOneBy(array('id' => $id));
        
        if (!$borrow) {
            return $response->withStatus(409);
        }
        
        $date = new DateTime();
        $borrow->setBorrowing($date);
        
        $date = new DateTime();
        $date->add(new DateInterval('P1M'));
        $borrow->setPlannedReturn($date);
        
        $em->persist($borrow);
        $em->flush();
        
        return $response->withJson($borrow->toArray(), 200);
    }

    function closeBorrowing($request, $response, $args) {
        global $em;

        if (!Auth::isAdmin()) {
            return $response->withStatus(401);
        }

        $id = (int)$args['id'];

        $repoBorrow = $em->getRepository('App\Entity\Borrow');

        $borrow = $repoBorrow->findOneBy(array('id' => $id));
        
        if (!$borrow) {
            return $response->withStatus(409);
        }
        
        $date = new DateTime();
        $borrow->setEffectiveReturn($date);
        
        $em->persist($borrow);
        $em->flush();
        
        return $response->withJson($borrow->toArray(), 200);
    }
}
