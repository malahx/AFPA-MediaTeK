<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BorrowRepository extends EntityRepository {

    public static function setBorrows($repo, $docs, $user_id = null) {
        $em = $repo->getEntityManager();
        $repoBorrow = $em->getRepository('AppBundle:Borrow');
        $borrows = $repoBorrow->findAllActive($user_id);
        // A améliorer
        foreach ($docs as $doc) {
            foreach ($borrows as $borrow) {
                if ($borrow->getDocument() == $doc->getDocument()) {
                    $doc->setBorrow($borrow->getEffectiveReturn() ? 3 : $borrow->getBorrowing() ? 2 : 1);
                    break;
                }
            }
        }
        return $docs;
    }

    public static function setBorrow($repo, $doc) {
        $em = $repo->getEntityManager();
        $repoBorrow = $em->getRepository('AppBundle:Borrow');
        $borrows = $repoBorrow->findActiveBy($doc->getDocument()->getId());
        if ($borrows) {
            $doc->setBorrow($borrows[0]->getEffectiveReturn() ? 3 : $borrows[0]->getBorrowing() ? 2 : 1);
        }
        return $doc;
    }

    public function findActiveBy($id) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where("b.effectiveReturn IS NULL")
                ->andWhere("d.id = :doc_id")
                ->setParameter('doc_id', $id)
                ->setMaxResults(1);
        return $qb->getQuery()->getResult();
    }

    public function findAllActive($user_id = null) {
        $qb = $this->createQueryBuilder('b')
                ->join('b.document', 'd')
                ->where("b.effectiveReturn IS NULL");
        if ($user_id != null) {
            $qb->andWhere("b.user = :user_id")
                    ->setParameter('user_id', $user_id);
        }
        return $qb->getQuery()->getResult();
    }

}
