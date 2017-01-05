<?php

namespace App\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityRepository;

class CdRepository extends EntityRepository {

    public function findAllAfter($date) {
        
        $qb = $this->createQueryBuilder('c')
                ->join('c.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        
        $cds = $qb->getQuery()->getResult();
        
        return BorrowRepository::setBorrows($this, $cds);
    }

    public function findAllBorrowed($user_id = null) {
        
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->leftJoin('App\Entity\Borrow', 'bo', Join::WITH, 'bo.document = d')
                ->where('bo.effectiveReturn IS NULL');
        
        if ($user_id != null) {
            $qb->andWhere('bo.user = :user_id')
                    ->setParameter('user_id', $user_id);
        } else {
             $qb->andWhere("bo.user != ''");
        }
        
        $cds = $qb->getQuery()->getResult();
        
        return BorrowRepository::setBorrows($this, $cds, $user_id);
    }

}
