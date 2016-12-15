<?php

namespace AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

class ComicRepository extends EntityRepository {

    public function findAllAfter($em, DateTime $date) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        $books = $qb->getQuery()->getResult();
        $repoBorrow = $em->getRepository('AppBundle:Borrow');
        $borrows = $repoBorrow->findAllActive();
        // A améliorer (intégrer dans le contructeur de l'entité par exemple, ou un meilleur query builder)
        foreach ($books as $book) {
            foreach ($borrows as $borrow) {
                if ($borrow->getDocument() == $book->getDocument()) {
                    $book->setBorrow($borrow->getBorrowing() ? 2 : 1);
                    break;
                }
            }
        }

        return $books;
    }

}
