<?php

namespace AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

class BorrowRepository extends EntityRepository {

    public function findAllActive() {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where("b.effectiveReturn IS NULL");
        return $qb->getQuery()->getResult();
    }
    public function findAllFrom($user_id) {
        $qb = $this->createQueryBuilder('b')
                ->innerJoin('b.document', 'd')
                //->innerJoin('AppBundle\Entity\Book','bo','b.document = bo.document')
                //->innerJoin('AppBundle\Entity\Cd','cd','b.document = cd.document')
                //->innerJoin('AppBundle\Entity\Comic','co','b.document = co.document')
                //->where('b.user.id = :user_id')
                //->setParameter(':user_id', $user_id)
                ;
        return $qb->getQuery()->getResult();
    }
}
