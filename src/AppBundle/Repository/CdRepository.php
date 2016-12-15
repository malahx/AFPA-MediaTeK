<?php

namespace AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

class CdRepository extends EntityRepository {

    public function findAllAfter($em, DateTime $date) {
        $qb = $this->createQueryBuilder('c')
                ->join('c.document', 'd')
                ->where('d.date > :date')
                ->setParameter('date', $date);
        $cds = $qb->getQuery()->getResult();
        $repoBorrow = $em->getRepository('AppBundle:Borrow');
        $borrows = $repoBorrow->findAllActive();
        // A améliorer (intégrer dans le contructeur de l'entité par exemple, ou un meilleur query builder)
        foreach ($cds as $cd) {
            foreach ($borrows as $borrow) {
                if ($borrow->getDocument() == $cd->getDocument()) {
                    $cd->setBorrow($borrow->getBorrowing() ? 2 : 1);
                    break;
                }
            }
        }

        return $cds;
    }

}
