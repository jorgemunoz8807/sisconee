<?php
/**
 * Created by PhpStorm.
 * User: cmar
 * Date: 20/11/14
 * Time: 11:34
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TipoServicioRepository extends EntityRepository
{
    public function  countForAdminList($filter) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('tipo_servicio'))
            ->from('sisconeeAppBundle:TipoServicio', 'tipo_servicio')
            ->where($query->expr()->eq('tipo_servicio.activo', '?1'))
            ->setParameter(1, '1');

        if (!is_null($filter)) {
            $query->andWhere($query->expr()->like('tipo_servicio.descripcion', '?2'))
                ->setParameter(2, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();
    }

    public function findAllForAdminList($column, $order, $filter, $first_record, $records_per_page) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('tipo_servicio')
            ->from('sisconeeAppBundle:TipoServicio', 'tipo_servicio')
            ->orderBy('tipo_servicio.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where($query->expr()->eq('tipo_servicio.activo', '?1'))
            ->setParameter(1, '1');


        if (!is_null($filter)) {
            $query->andWhere($query->expr()->like('tipo_servicio.descripcion', '?2'))
                ->setParameter(2, '%' . $filter . '%');
        }


        return $query->getQuery()->getResult();
    }


}