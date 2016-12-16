<?php

namespace AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository {

    public function findAllNext() {
        $date = new DateTime();

        $qb = $this->createQueryBuilder('e')
                ->where('e.date > :date')
                ->setParameter('date', $date);
        return $qb->getQuery()->getResult();
    }

}
