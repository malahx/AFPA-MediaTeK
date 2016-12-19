<?php

namespace AppBundle\Controller;

use DateTime;
use DateInterval;
use AppBundle\Entity\Borrow;
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
     * @Route("/catalog", name="catalog")
     */
    public function catalogAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');

        $books = BorrowRepository::setBorrows($repoBook, $repoBook->findAll());
        $cds = BorrowRepository::setBorrows($repoCd, $repoCd->findAll());
        $comics = BorrowRepository::setBorrows($repoComic, $repoComic->findAll());

        return $this->render('AppBundle::home.html.twig', array(
                    'title' => 'Catalogue',
                    'books' => $books,
                    'cds' => $cds,
                    'comics' => $comics));
    }

    /**
     * @Route("/document/{id}", name="document")
     */
    public function documentAction($id) {

        $em = $this->getDoctrine()->getManager();

        $repoBook = $em->getRepository('AppBundle:Book');
        $repoCd = $em->getRepository('AppBundle:Cd');
        $repoComic = $em->getRepository('AppBundle:Comic');
        $repoBorrow = $em->getRepository('AppBundle:Borrow');

        $book = $repoBook->findOneBy(array('document' => $id));
        $cd = $repoCd->findOneBy(array('document' => $id));
        $comic = $repoComic->findOneBy(array('document' => $id));
        $borrow = $repoBorrow->findActiveBy($id);

        if ($borrow) {
            $borrow = $borrow[0];
        }

        if ($book) {
            $document = $book;
            $author = $document->getAuthor();
            $type = 'ce livre';
        } elseif ($cd) {
            $document = $cd;
            $author = $document->getComposer();
            $type = 'ce disque';
        } else {
            $document = $comic;
            $author = $document->getCartoonist();
            $type = 'cette bande déssiné';
        }

        return $this->render('AppBundle::document.html.twig', array(
                    'title' => 'Document',
                    'docTitle' => $document->getDocument()->getTitle(),
                    'author' => $author,
                    'borrow' => $borrow,
                    'cover' => $document->getDocument()->getCover(),
                    'type' => $type,
                    'id' => $document->getDocument()->getId()));
    }

}
