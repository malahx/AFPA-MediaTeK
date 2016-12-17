<?php

namespace AppBundle\Controller;

use DateTime;
use DateInterval;
use AppBundle\Repository\BorrowRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function newsAction(Request $request) {
        $date = new DateTime();
        $date->sub(new DateInterval('P1M'));

        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');

        $books = $repoBook->findAllAfter($date);
        $cds = $repoCd->findAllAfter($date);
        $comics = $repoComic->findAllAfter($date);

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Nouveautés',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }

    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogueAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');

        $books = BorrowRepository::setBorrow($repoBook, $repoBook->findAll());
        $cds = BorrowRepository::setBorrow($repoCd, $repoCd->findAll());
        $comics = BorrowRepository::setBorrow($repoComic, $repoComic->findAll());

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Catalogue',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }

    /**
     * @Route("/myborrows", name="myborrows")
     */
    public function myborrowsAction(Request $request) {
        $user_id = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');

        $books = $repoBook->findAllBorrowed($user_id);
        $cds = $repoCd->findAllBorrowed($user_id);
        $comics = $repoComic->findAllBorrowed($user_id);

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Vos Emprunts',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }

    /**
     * @Route("/borrows", name="borrows")
     */
    public function borrowsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');

        $books = $repoBook->findAllBorrowed();
        $cds = $repoCd->findAllBorrowed();
        $comics = $repoComic->findAllBorrowed();

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Tous les Emprunts',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }
}
