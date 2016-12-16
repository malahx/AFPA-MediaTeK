<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityRepository;

class CdRepository extends EntityRepository {

    public function findAllAfter($date) {
        $qb = $this->createQueryBuilder('c')
                ->join('c.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        $cds = $qb->getQuery()->getResult();
        return BorrowRepository::setBorrow($this, $cds);
    }

    public function findAllBorrowedBy($user_id) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->leftJoin('AppBundle\Entity\Borrow', 'bo', Join::WITH, 'bo.document = d')
                ->where('bo.user = :user_id')
                ->setParameter('user_id', $user_id);
        $cds = $qb->getQuery()->getResult();
        return BorrowRepository::setBorrow($this, $cds, $user_id);
    }

}
