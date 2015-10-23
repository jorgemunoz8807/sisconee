<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 25/11/2014
 * Time: 13:05
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EntidadRepository extends EntityRepository
{
    public function  countForAdminList($filter)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('entidad'))
            ->from('sisconeeAppBundle:Entidad', 'entidad');

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('entidad.nombre', '?1'))
                 $query->andWhere(
                     'entidad.codReeup like ?1 OR
                                entidad.siglas like ?1 OR
                                entidad.nombre like ?1'
                 )
                     ->setParameter(1, '%' . $filter . '%');

        }

        return $query->getQuery()->getSingleScalarResult();
    }

    /*Retorna la cantidad de entidades pertenecientes a un organismo determinado*/
    public function countOfEntitiesBelongingTo($organism, $filter)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('e'))
            ->from('sisconeeAppBundle:Entidad', 'e')
            ->where('e.organismo = ?1')
            ->setParameter(1, $organism);


        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('e.nombre', '?2'))
            $query->andWhere(
                'e.codReeup like ?2 OR
                                e.siglas like ?2 OR
                                e.nombre like ?2'
            )
                ->setParameter(2, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();
    }

    public function countOfEntitiesSubordinatedTo($entity, $filter)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('entidad'))
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad = ?1')
            ->orWhere('entidad.entidadPadre = ?2')
            ->setParameters(array(1 => $entity, 2 => $entity));

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('entidad.nombre', '?1'))
            $query->andWhere(
                'entidad.codReeup like ?1 OR
                                entidad.siglas like ?1 OR
                                entidad.nombre like ?1'
            )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();
    }

    public function findAllQuery()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad');

        return $query;
    }


    public function findAllForAdminList($column, $order, $filter, $first_record, $records_per_page)
    {
        /* $em = $this->getEntityManager();
         $query = $em->createQueryBuilder();

         $query->select('entidad')
             ->from('sisconeeAppBundle:Entidad', 'entidad')*/
        $query = $this->findAllQuery();

        $query
            ->orderBy('entidad.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('entidad.nombre', '?1'))
                 $query->andWhere(
                     'entidad.codReeup like ?1 OR
                                entidad.siglas like ?1 OR
                                entidad.nombre like ?1'
                 )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getResult();
    }

    /*Retorna la entidad base de un organismo determinado */
    public function getBaseEntity($organism)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad.id')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.organismo = ?1')
            ->andWhere('entidad.entidadPadre IS NULL')
            //->orWhere('entidad.entidadPadre = entidad.id')
            ->setParameter(1, $organism);
        //->setParameter(2, 'NULL');

        //return $query;
        return $this->findOneById($query->getQuery()->getSingleResult());

    }

    public function findAllEntitiesWithServicesBelongingTo($organismId)
    {


        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('e')
            ->from('sisconeeAppBundle:Entidad', 'e')
            ->innerJoin('sisconeeAppBundle:Servicio', 'ser', 'With', 'e.id=ser.entidad')
            ->where('e.organismo=?1')
            ->setParameter(1, $organismId);

        return $query->getQuery()->getResult();
    }


    public function findAllParentEntitiesBelongingTo($organismId)
    {
        $em = $this->getEntityManager();

        $query = $em->createQueryBuilder();

        $query->select('p')->distinct()
            ->from('sisconeeAppBundle:Entidad', 'e')
            ->innerJoin('sisconeeAppBundle:Entidad', 'p', 'With', 'p.id=e.entidadPadre')
            ->where('p.organismo=:organismId')->setParameter('organismId', $organismId);

        $result = $query->getQuery()->getResult();

        /*$query = $em->createQuery(
            'SELECT DISTINCT p.id FROM sisconee\AppBundle\Entity\Entidad e JOIN e.entidadPadre p WHERE e.organismo= ?1'
        );

        $query ->setParameter(1, $organismId);

        $parentIds = $query ->getResult();

        //var_dump($parentIds);

        $result = [];
        foreach($parentIds as $p)
        {
            $queryBuilder = $em->createQueryBuilder();
            //var_dump($p);
            //var_dump($p['id']);
           array_push($result,
               $queryBuilder->select('e')
               ->from('sisconeeAppBundle:Entidad', 'e')
               ->where('e = ?1')->setParameter(1, $p['id'])->getQuery()->getResult()[0]);
        }*/

        return $result;
        // var_dump($result);

        /*$em->createQuery(
            'SELECT DISTINCT e.entidadPadre.id FROM sisconee\AppBundle\Entity\Entidad e WHERE e.organismo = 96'
        )->execute();*/


        /*$query = $em->createQueryBuilder();

        $query->select('entidad.organismo')->distinct()
            ->from ('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.organismo = :org')->setParameter('org', $organism);

        $query->getQuery()->execute();*/
        // ->innerJoin('entidad.entidadPadre','parent', 'WITH', 'entidad.id=:parent');

        // return  $query->getQuery()->getResult();

        /*$query->select('entidad')
            ->from ('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.id = :org')->setParameter('org', $organism);*/


    }


    /*Retorna todas las entidades pertenecientes a un organismo determinado*/
    public function findAllBelongingTo($organism)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.organismo = ?1')
            ->setParameter(1, $organism);

        return $query;
        // return  $query->getQuery()->getResult();

    }

    /*Retorna todas las entidades subordinadas a una entidad determinada*/
    public function findAllSubordinatedTo($entity)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.entidadPadre = :parent')->setParameter('parent', $entity->getId());

        return $query->getQuery()->getResult();

    }

    /*Retorna todas las entidades a las que se les haya asignado plan*/
    public function findAllWithPlan()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('entidad.id')
            ->distinct('entidad.id')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->innerJoin('sisconeeAppBundle:PlanAnualEntidad', 'plananual', 'with', 'entidad.id = plananual.entidad');

        return $qb->getQuery()->getResult();
    }

    /*Retorna todas las entidades subordinadas a una entidad determinada que no tengan plan asignado*/
    public function findAllSubordinatedToWithoutPlan($entity)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $entitiesWithPlan = $this->findAllWithPlan($entity);

        $qb->select('entidad')
            //->distinct('entidad.id')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.entidadPadre=:parent')->setParameter('parent', $entity->getId());
        if (sizeof($entitiesWithPlan) != 0) {
            $qb->andWhere($qb->expr()->notIn('entidad.id', '?1'))->setParameter(1, $entitiesWithPlan);
        }

        return $qb->getQuery()->getResult();
    }

    /*Retorna todas las entidades pertenecientes a un organismo determinado filtradas y ordenadas*/
    public function findAllForAdminListBelongingTo(
        $organism,
        $column,
        $order,
        $filter,
        $first_record,
        $records_per_page
    ) {
        /*$em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query
            ->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->orderBy('entidad.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where('entidad.organismo = ?1')
            ->setParameter(1, $organism);*/

        $query = $this->findAllBelongingTo($organism);
        $query
            ->orderBy('entidad.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);


        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('entidad.nombre', '?2'))
            $query->andWhere(
                'entidad.codReeup like ?2 OR
                                entidad.siglas like ?2 OR
                                entidad.nombre like ?2'
            )
                ->setParameter(2, '%' . $filter . '%');

        }

        return $query->getQuery()->getResult();

    }

    /*Retorna todas las entidades subordinadas a una entidad determinada (incluyendo la propia entidad) filtradas y ordenadas*/
    public function findAllForAdminListSubordinatedTo(
        $entity,
        $column,
        $order,
        $filter,
        $first_record,
        $records_per_page
    ) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->orderBy('entidad.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page)
            ->where('entidad = ?1')
            ->orWhere('entidad.entidadPadre = ?2')
            ->setParameters(array(1 => $entity, 2 => $entity));

        if (!is_null($filter)) {
//            $query->andWhere($query->expr()->like('entidad.nombre', '?1'))
                 $query->andWhere(
                     'entidad.codReeup like ?1 OR
                                entidad.siglas like ?1 OR
                                entidad.nombre like ?1'
                 )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getResult();

    }

    public function findAllWithServices()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('e')
            ->from('sisconeeAppBundle:Entidad', 'e')
            ->innerJoin('sisconeeAppBundle:Servicio', 'ser', 'WITH', 'e.id=ser.entidad');

        return $query->getQuery()->getResult();
    }

    public function getEntityByRoleAndProvincia($organismo, $Provincia, $Role_Usuario, $idEntityUser)
    {
        /* $Provincia este parametro cuando representa todas las provincias se pasa en vacio.
           $idEntityUser este parametro cuando representa todas las provincias se pasa en vacio*/

        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('entidad')
            ->from('sisconeeAppBundle:Entidad', 'entidad')
            ->where('entidad.organismo = ?1')
            ->setParameter(1, $organismo);

        if (!is_null($Provincia)) {
            $query->andWhere('entidad.provincia = ?2')
                ->setParameter(2, $Provincia);

        }

        if (($Role_Usuario == 'ROLE_PLANIFICADOR_SER') || ($Role_Usuario == 'ROLE_REGISTRADOR_SER')) {
            $query->andWhere('entidad.id = ?3')
                ->setParameter(3, $idEntityUser);


        }

        if (($Role_Usuario == 'ROLE_PLANIFICADOR_ENT') || ($Role_Usuario == 'ROLE_SUPERVISOR_ENT')) {
            $query->andWhere('entidad.id = ?4 or entidad.entidadPadre = ?5 ')
                // ->orWhere('entidad.entidadPadre = ?5')
                ->setParameter(4, $idEntityUser)
                ->setParameter(5, $idEntityUser);


        }

        return $query->getQuery()->getResult();
    }
}