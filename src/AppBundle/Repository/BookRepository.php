<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository {

    public function findAllAfter($date) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        $books = $qb->getQuery()->getResult();
        return BorrowRepository::setBorrows($this, $books);
    }

    public function findAllBorrowed($user_id = null) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->leftJoin('AppBundle\Entity\Borrow', 'bo', Join::WITH, 'bo.document = d')
                ->where('bo.effectiveReturn IS NULL');
        if ($user_id != null) {
            $qb->andWhere('bo.user = :user_id')
                    ->setParameter('user_id', $user_id);
        } else {
             $qb->andWhere("bo.user != ''");
        }
        $books = $qb->getQuery()->getResult();
        return BorrowRepository::setBorrows($this, $books, $user_id);
    }

}
