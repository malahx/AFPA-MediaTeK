<?php

namespace AppBundle\Controller;

use DateTime;
use DateInterval;
use AppBundle\Entity\Borrow;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BorrowController extends Controller {

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

    /**
     * @Route("/resa/{id}", name="resa")
     */
    public function resaAction($id) {
        $em = $this->getDoctrine()->getManager();

        $repoDocument = $em->getRepository('AppBundle:Document');
        $repoBorrow = $em->getRepository('AppBundle:Borrow');

        $document = $repoDocument->findOneBy(array('id' => $id));
        $borrows = $repoBorrow->findActiveBy($id);
        if (!$borrows) {
            return $this->redirectToRoute('catalog');
        }

        $user = $this->getUser();

        $borrow = new Borrow(new DateTime(), $document, $user);

        $em->persist($borrow);
        $em->flush();
        return $this->redirectToRoute('myborrows');
    }

    /**
     * @Route("/borrow/{id}", name="borrow")
     */
    public function borrowAction($id) {
        $em = $this->getDoctrine()->getManager();

        $repoBorrow = $em->getRepository('AppBundle:Borrow');

        $borrow = $repoBorrow->findOneBy(array('id' => $id));
        if (!$borrow) {
            return $this->redirectToRoute('catalog');
        }
        $date = new DateTime();
        $borrow->setBorrowing($date);
        $date = new DateTime();
        $date->add(new DateInterval('P1M'));
        $borrow->setPlannedReturn($date);
        $em->persist($borrow);
        $em->flush();
        return $this->redirectToRoute('borrows');
    }

    /**
     * @Route("/closeBorrowing/{id}", name="closeBorrowing")
     */
    public function closeBorrowingAction($id) {
        $em = $this->getDoctrine()->getManager();

        $repoBorrow = $em->getRepository('AppBundle:Borrow');

        $borrow = $repoBorrow->findOneBy(array('id' => $id));
        if (!$borrow) {
            return $this->redirectToRoute('catalog');
        }
        $date = new DateTime();
        $borrow->setEffectiveReturn($date);
        $em->persist($borrow);
        $em->flush();
        return $this->redirectToRoute('borrows');
    }
}
