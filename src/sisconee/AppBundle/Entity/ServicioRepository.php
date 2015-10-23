<?php
/**
 * Created by PhpStorm.
 * User: cmar
 * Date: 24/11/14
 * Time: 12:36
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ServicioRepository extends EntityRepository
{

    public function  countForAdminList($filter)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('servicio'))
            ->from('sisconeeAppBundle:Servicio', 'servicio');

        if (!is_null($filter)) {
//            $query->where($query->expr()->like('servicio.nombre', '?1'))
                $query->andWhere(
                    'servicio.nombre like ?1 OR
                                servicio.codClienteEE like ?1 OR
                                servicio.codRutaFolio like ?1'
                )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();
    }

    public function  countForAdminListBelongToOrg($organismo, $filter)
    {

        /*$em = $this->getEntityManager();
        /*$query = $em->createQueryBuilder();

        $query->select($query->expr()->count('servicio'))
            ->from('sisconeeAppBundle:Servicio', 'servicio');

        if (!is_null($filter)) {
            $query->where($query->expr()->like('servicio.nombre', '?1'))
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();

        //$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT Count(S) FROM sisconee\AppBundle\Entity\Servicio S WHERE (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.organismo=?2))');

        $query ->setParameter(2, $organismo->getId());

        /*if (!is_null($filter)) {
            $query->andWhere($query->expr()->like('servicio.nombre', '?3'))
                ->setParameter(3, '%' . $filter . '%');
        }

        return $query->getSingleScalarResult();*/

        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.organismo=?1');

        $query->setParameter(1, $organismo->getId());

        $listado_entidades_organismo = $query->getArrayResult();

        /*$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT S FROM sisconee\AppBundle\Entity\Servicio S WHERE (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.organismo=?2))');
        $query ->setParameter(2, $organismo->getId());*/

        $query = $em->createQueryBuilder();

        $query->select('COUNT(servicio)')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->where($query->expr()->eq('servicio.activo', '?2'))
            ->setParameter(2, '1');

        $query->andWhere($query->expr()->in('servicio.entidad', '?3'))->setParameter(3, $listado_entidades_organismo);

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('servicio.nombre', '?4'))
                $query->andWhere(
                    'servicio.nombre like ?4 OR
                                servicio.codClienteEE like ?4 OR
                                servicio.codRutaFolio like ?4'
                )
                ->setParameter(4, '%' . $filter . '%');


        }


        //return $query->getResult();
        return $query->getQuery()->getSingleScalarResult();
    }

    public function  countForAdminListBelongTo($entidad, $filter)
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?1');

        $query->setParameter(1, $entidad->getId());

        $listado_entidades_hijas = $query->getArrayResult();

        /*$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT S FROM sisconee\AppBundle\Entity\Servicio S WHERE ((S.entidad=?2) or (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?2)))
                                   order');
        $query ->setParameter(2, $entidad->getId());*/

        $query = $em->createQueryBuilder();

        $query->select('COUNT(servicio)')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->where($query->expr()->eq('servicio.activo', '?2'))
            ->setParameter(2, '1');

        $query->andWhere('servicio.entidad = ?3')->setParameter(3, $entidad->getId());


        $query->andWhere($query->expr()->in('servicio.entidad', '?4'))->setParameter(4, $listado_entidades_hijas);

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('servicio.nombre', '?5'))
                $query->andWhere(
                    'servicio.nombre like ?5 OR
                                servicio.codClienteEE like ?5 OR
                                servicio.codRutaFolio like ?5'
                )
                ->setParameter(5, '%' . $filter . '%');
        }


        //return $query->getResult();
        return $query->getQuery()->getSingleScalarResult();

        /*$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT Count(S) FROM sisconee\AppBundle\Entity\Servicio S WHERE ((S.entidad=?2) or (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?2)))');

        $query ->setParameter(2, $entidad->getId());
        //$query ->setParameter(3, '%' . $filter . '%');

        //$em = $this->getEntityManager();
        /* $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('servicio'))
            ->from('sisconeeAppBundle:Servicio', 'servicio');*/

        /*if (!is_null($filter)) {
            $query->where($query->expr()->like('servicio.nombre', '?3'))
                ->setParameter(3, '%' . $filter . '%');
        }

        return $query->getSingleScalarResult();*/
    }

    public function findAllForAdminList($column, $order, $filter, $first_record, $records_per_page)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('servicio')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->orderBy('servicio.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);

        if (!is_null($filter)) {
//            $query->where($query->expr()->like('servicio.nombre', '?1'))
                $query->andWhere(
                    'servicio.nombre like ?1 OR
                                servicio.codClienteEE like ?1 OR
                                servicio.codRutaFolio like ?1'
                )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getResult();
    }

    public function findAllBelongToEnt($entidad)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?1');

        $query->setParameter(1, $entidad->getId());

        $listado_entidades_hijas = $query->getArrayResult();
        $query = $em->createQueryBuilder();

        $query->select('servicio')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
//            ->orderBy('servicio.' . $column, $order)
//            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where($query->expr()->eq('servicio.activo', '?2'))
            ->setParameter(2, '1');

        $query->andWhere('servicio.entidad = ?3')->setParameter(3, $entidad->getId());

        $query->andWhere($query->expr()->in('servicio.entidad', '?4'))->setParameter(4, $listado_entidades_hijas);

//        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('servicio.nombre', '?5'))
//                ->setParameter(5, '%' . $filter . '%');
//    }
        return $query->getQuery()->getResult();


    }

    public function findAllBelongTo($entidad, $column, $order, $filter, $first_record, $records_per_page)
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?1');

        $query->setParameter(1, $entidad->getId());

        $listado_entidades_hijas = $query->getArrayResult();

        /*$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT S FROM sisconee\AppBundle\Entity\Servicio S WHERE ((S.entidad=?2) or (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.entidadPadre=?2)))
                                   order');
        $query ->setParameter(2, $entidad->getId());*/

        $query = $em->createQueryBuilder();

        $query->select('servicio')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->orderBy('servicio.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where($query->expr()->eq('servicio.activo', '?2'))
            ->setParameter(2, '1');

        $query->andWhere('servicio.entidad = ?3')->setParameter(3, $entidad->getId());

        $query->andWhere($query->expr()->in('servicio.entidad', '?4'))->setParameter(4, $listado_entidades_hijas);

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('servicio.nombre', '?5'))
                $query->andWhere(
                    'servicio.nombre like ?5 OR
                                servicio.codClienteEE like ?5 OR
                                servicio.codRutaFolio like ?5'
                )
                ->setParameter(5, '%' . $filter . '%');


        }


        //return $query->getResult();
        return $query->getQuery()->getResult();
    }

    public function findAllBelongToOrg($organismo, $column, $order, $filter, $first_record, $records_per_page)
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.organismo=?1');

        $query->setParameter(1, $organismo->getId());

        $listado_entidades_organismo = $query->getArrayResult();

        /*$em = $this->getEntityManager();

        $query = $em->createQuery('SELECT S FROM sisconee\AppBundle\Entity\Servicio S WHERE (S.entidad IN
                                   (SELECT E.id from sisconee\AppBundle\Entity\Entidad E where E.organismo=?2))');
        $query ->setParameter(2, $organismo->getId());*/

        $query = $em->createQueryBuilder();

        $query->select('servicio')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->orderBy('servicio.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where($query->expr()->eq('servicio.activo', '?2'))
            ->setParameter(2, '1');

        $query->andWhere($query->expr()->in('servicio.entidad', '?3'))->setParameter(3, $listado_entidades_organismo);

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('servicio.nombre', '?4'))
            $query->andWhere(
                'servicio.nombre like ?4 OR
                                servicio.codClienteEE like ?4 OR
                                servicio.codRutaFolio like ?4 '
            )
                ->setParameter(4, '%' . $filter . '%');


        }


        //return $query->getResult();
        return $query->getQuery()->getResult();
    }

    public function findServicios($idTipoServicio)
    {

        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('servicio')
            ->from('sisconeeAppBundle:Servicio', 'servicio')
            ->orderBy('servicio.nombre', 'ASC')
            ->where($query->expr()->eq('servicio.tipoServicio', '?1'))
            ->setParameter(1, $idTipoServicio);

        return $query->getQuery()->getResult();
    }

//    servicios subordinados a una entidad

    public function servicesSubordinated($entity)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('ser')
            ->from('sisconeeAppBundle:Servicio', 'ser')
            ->innerJoin('sisconeeAppBundle:Entidad', 'ent', 'With', 'ser.entidad=ent.id')
            ->where('ent.id=?1')
            ->setParameter(1, $entity->getId());
        return $query->getQuery()->getResult();
    }

    public function servicesIdsWithPlan()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('ser.id')
            ->distinct('ser.id')
            ->from('sisconeeAppBundle:Servicio', 'ser')
            ->innerJoin('sisconeeAppBundle:PlanAnualServicio', 'pas', 'With', 'ser.id=pas.servicio');
    return $query->getQuery()->getResult();

    }

    //method for services without plan belong to an entity ID
    public function servicesWithoutPlan($parentientityId)
    {

        $listIdServicesWithPlan=$this->servicesIdsWithPlan();
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        if(sizeof($listIdServicesWithPlan)==0)
        {
            $query->select('ser')
//            ->distinct('ser.id')
                ->from('sisconeeAppBundle:Servicio', 'ser')
                ->where('ser.entidad=?1')
                ->setParameter(1,$parentientityId);

            return $query->getQuery()->getResult();
        }

        $query->select('ser')
//            ->distinct('ser.id')
            ->from('sisconeeAppBundle:Servicio', 'ser')
            ->where('ser.entidad=?1')
            ->andWhere($query->expr()->notIn('ser.id', '?2'))
            ->setParameter(1,$parentientityId)
            ->setParameter(2, $listIdServicesWithPlan);

        return $query->getQuery()->getResult();
    }

    /*Devuelve todos los servicios que pertenecen directamente a una entidad determinada*/
    public function findAllDirectlyBelongTo($entity)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('s')
            ->from('sisconeeAppBundle:Servicio', 's')
            ->where('s.entidad = :serviceEntity')->setParameter('serviceEntity', $entity->getId());

        return $query->getQuery()->getResult();
    }

}







