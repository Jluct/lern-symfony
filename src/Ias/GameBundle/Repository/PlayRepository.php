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

    public function getPlay($id)
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('p')
            ->from(self::TABLE, 'p')
            ->leftJoin('p.gameSession', 's')
            ->where('s.id = :id')
            ->setParameters(['id' => $id])
        ;

        try {
            return $query->getQuery()->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}