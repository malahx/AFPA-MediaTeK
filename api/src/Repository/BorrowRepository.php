<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class BorrowRepository extends EntityRepository {

    public static function setBorrows($repo, $docs, $user_id = null) {
        
        $em = $repo->getEntityManager();
        
        $repoBorrow = $em->getRepository('App\Entity\Borrow');
        
        $borrows = $repoBorrow->findAllActive($user_id);
        
        // Amélioration possible
        
        foreach ($docs as $doc) {
            foreach ($borrows as $borrow) {
                if ($borrow->getDocument() == $doc->getDocument()) {
                    $doc->setBorrow($borrow);
                    break;
                }
            }
        }
        
        return $docs;
    }

    public static function setBorrow($repo, $doc) {
        
        $em = $repo->getEntityManager();
        
        $repoBorrow = $em->getRepository('App\Entity\Borrow');
        
        $borrows = $repoBorrow->findActiveBy($doc->getDocument()->getId());
        
        if ($borrows) {
            $doc->setBorrow($borrows[0]);
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
