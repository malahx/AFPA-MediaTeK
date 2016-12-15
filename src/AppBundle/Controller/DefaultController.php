<?php

namespace AppBundle\Controller;

use DateTime;
use DateInterval;
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
        
        $books = $repoBook->findAllAfter($em, $date);
        $cds = $repoCd->findAllAfter($em, $date);
        $comics = $repoComic->findAllAfter($em, $date);

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
        
        $books = $repoBook->findAll();
        $cds = $repoCd->findAll();
        $comics = $repoComic->findAll();

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Catalogue',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }

    /**
     * @Route("/emprunts", name="emprunts")
     */
    public function empruntsAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        
        $repoBorrow = $em->getRepository('AppBundle:Borrow');
        
        $user_id = $this->getUser()->getId();
        
        $borrows = $repoBorrow->findAllFrom($user_id);

        return $this->render('AppBundle::borrows.html.twig', array(
                    'title' => 'Vos Emprunts',
                    'borrows' => $borrows));
    }
   
}
