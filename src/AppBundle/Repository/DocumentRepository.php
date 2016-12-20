<?php

namespace AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

class DocumentRepository extends EntityRepository {

    public function findAllAfter(DateTime $date) {
        
        $qb = $this->createQueryBuilder('d')
                ->leftJoin('AppBundle\Entity\Book', 'b', \Doctrine\ORM\Query\Expr\Join::WITH, 'd = b.document')
                ->leftJoin('AppBundle\Entity\Cd', 'c', \Doctrine\ORM\Query\Expr\Join::WITH, 'd = c.document');
        
        return $qb->getQuery()->getResult();
    }

}
