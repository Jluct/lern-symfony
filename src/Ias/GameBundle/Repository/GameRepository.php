<?php

namespace Ias\GameBundle\Repository;

use Ias\GameBundle\Entity\Game;
use Symfony\Component\VarDumper\VarDumper;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends \Doctrine\ORM\EntityRepository
{
    public function getActiveGameSession()
    {

//        $query = $this->getEntityManager()
//            ->createQuery('SELECT p, c, d FROM IasGameBundle:Game p
//                            JOIN p.gameSession c
//                            JOIN c.gamer d
//                            ORDER BY p.name');

        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('g,s,u,i')->from('IasGameBundle:Game', 'g')
            ->leftJoin('g.gameSession', 's')
            ->leftJoin('s.gamer', 'u')
            ->leftJoin('u.user', 'i')
            ->where('s.status = 0')
            ->getQuery()
        ;


        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    public function getAllGameInBase()
    {
        $db = $this->getEntityManager()->createQueryBuilder()->select('g')->from('IasGameBundle:Game', 'g');
        $request = $db->getQuery();
        
        try {
            return $request->execute();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
