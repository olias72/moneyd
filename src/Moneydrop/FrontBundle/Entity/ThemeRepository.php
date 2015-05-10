<?php

namespace Moneydrop\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ThemeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ThemeRepository extends EntityRepository
{
    public function randomOne()
    {
        $id = rand(1, $this->count());

        return $this
            ->createQueryBuilder('c')
            ->select('c.id')
            ->where('c.id = '.$id)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function count()
    {
        return $this
            ->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

}
