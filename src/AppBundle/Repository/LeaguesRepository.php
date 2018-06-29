<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class LeaguesRepository extends EntityRepository
{
    public function searchLeauge($leaugeid)
    {
       return $this->createQueryBuilder('cat')
            ->andWhere('cat.id = :searchTerm')
            ->setParameter('searchTerm', $leaugeid)
            ->getQuery()
            ->execute();
      
    }
}

