<?php

namespace App\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityRepository;

class ComicRepository extends EntityRepository {

    public function findAllAfter($date) {
        
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        
        $comics = $qb->getQuery()->getResult();
        
        return BorrowRepository::setBorrows($this, $comics);
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
        
        $comics = $qb->getQuery()->getResult();
        
        return BorrowRepository::setBorrows($this, $comics, $user_id);
    }

}
