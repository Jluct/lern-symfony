<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 04.03.2017
 * Time: 14:36
 */

namespace Ias\GameBundle\Repository;


class PlayRepository extends \Doctrine\ORM\EntityRepository
{

    const TABLE = "IasGameBundle:Play";

    public function getPlay($id) //User id
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('p')
            ->from(self::TABLE, 'p')
            ->leftJoin('p.gameSession', 's')
            ->leftJoin('s.gamer', 'g')
            ->leftJoin('g.user', 'u')
            ->where('u.id = :id')
            ->setParameters(['id' => $id]);

        try {
            return $query->getQuery()->getFirstResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}