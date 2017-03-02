<?php

namespace Ias\GameBundle\Repository;

use Symfony\Component\Config\Definition\Exception\InvalidTypeException;

/**
 * GameSessionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameSessionRepository extends \Doctrine\ORM\EntityRepository
{
    public function loadGameSession($id)
    {
        if (!(integer)$id)
            throw new InvalidTypeException($id . " is not a number!");

        $qb = $this->getEntityManager()->createQueryBuilder();
        $query = $qb
            ->select('s', 'g')
            ->from('IasGameBundle:GameSession', 's')
            ->leftJoin('s.game', 'g')
            ->where('s.id = :id')
            ->andWhere('s.status = 0')
            ->setParameters(['id' => $id])
            ->getQuery();

        try {
            return $query->getResult()[0];
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}
