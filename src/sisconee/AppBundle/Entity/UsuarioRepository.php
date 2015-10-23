<?php
/**
 * Created by PhpStorm.
 * User: cmar
 * Date: 20/11/14
 * Time: 11:34
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\Count;

class UsuarioRepository extends EntityRepository
{
   
    public function  countForAdminList($filter) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select($query->expr()->count('usuario'))
            ->from('sisconeeAppBundle:Usuario', 'usuario');

        if (!is_null($filter)) {
//            $query->where($query->expr()->like('usuario.nombre', '?1'))
                 $query->andWhere(
                     'usuario.nombre like ?1 OR
                                usuario.username like ?1 OR
                                usuario.rol like ?1 OR
                                usuario.correo like ?1'
                 )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getSingleScalarResult();
    }

    public function findAllForAdminList($column, $order, $filter, $first_record, $records_per_page) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('usuario')
            ->from('sisconeeAppBundle:Usuario', 'usuario')
            ->orderBy('usuario.' . $column, $order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);

        if (!is_null($filter)) {
//            $query->where($query->expr()->like('usuario.nombre', '?1'))
                $query->andWhere(
                    'usuario.nombre like ?1 OR
                                usuario.username like ?1 OR
                                usuario.rol like ?1 OR
                                usuario.correo like ?1'
                )
                ->setParameter(1, '%' . $filter . '%');
        }

        return $query->getQuery()->getResult();
    }
    public function findAllBelongToEntity($entidad, $column, $order, $filter, $first_record, $records_per_page) {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT U FROM sisconee\AppBundle\Entity\Entidad U WHERE U.entidad=?1');
        $query ->setParameter(1, $entidad->getId());
        $list_entities_subordinated=$query->getArrayResult();
        $query=$em->createQueryBuilder();
        $query->select('usuario')
            ->from('sisconeeAppBundle:Usuario','usuario')
            ->orderBy('usuario.'.$column,$order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);
        $query->where('usuario.entidad=?2')->setParameter(2,$entidad->getId());
        $query->andWhere($query->expr()->in('usuario.entidad','?3'))->setParameter(3,$list_entities_subordinated);
       $query->andWhere($query->expr()->like('usuario.activo','?4')  )
            ->setParameter(4,1);

        if(!is_null($filter)){
//            $query->andWhere($query->expr()->like('usuario.nombre','?4'))
                $query->andWhere(
                    'usuario.nombre like ?4 OR
                                usuario.username like ?4 OR
                                usuario.rol like ?4 OR
                                usuario.correo like ?4'
                )
                ->setParameter(4,'%'.$filter.'%');
        }
        return $query->getQuery()->getResult();

    }
//method that return all the users belong to an especific organism
    public function findAllBelongToOrganism($organismo, $column, $order, $filter, $first_record, $records_per_page) {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT U.id from sisconee\AppBundle\Entity\Entidad U WHERE U.organismo=?1');
        $query ->setParameter(1, $organismo->getId());
        $list_entities_organism=$query->getArrayResult();
        $query=$em->createQueryBuilder();

        $query->select('usuario')
            ->from('sisconeeAppBundle:Usuario','usuario')
            ->orderBy('usuario.'.$column,$order)
            ->setFirstResult($first_record)->setMaxResults($records_per_page);
        $query->where($query->expr()->in('usuario.entidad','?2')   )
            ->setParameter(2,$list_entities_organism);
        $query->andWhere($query->expr()->like('usuario.activo','?3')  )
                ->setParameter(3,1);


        if(!is_null($filter)){
//            $query->andWhere($query->expr()->like('usuario.nombre','?4'))
                $query->andWhere(
                    'usuario.nombre like ?4 OR
                                usuario.username like ?4 OR
                                usuario.rol like ?4 OR
                                usuario.correo like ?4'
                )
                ->setParameter(4,'%'.$filter.'%');
        }
        return $query->getQuery()->getResult();

    }

    //method that return all entities belong toan especific





    //method that return the count of users from and especific organism
    public function countOfUserBelongToOrganism($organismo, $filter ) {
        $em = $this->getEntityManager();
          $query= $em->createQueryBuilder();
        $query->select($query->expr()->count('u'))
            ->from('sisconeeAppBundle:Usuario','u')
            ->innerJoin('sisconeeAppBundle:Entidad','e','with','u.entidad=e.id')
            ->innerJoin('sisconeeAppBundle:Organismo','o','with','e.organismo=o.id')
            ->where('o.id=:idOrganismo')
            ->andWhere('u.activo=:activo')
            ->setParameter('idOrganismo',$organismo)
            ->setParameter('activo',1);




//
//
//
//        $query = $em->createQuery('Select U.id from sisconee\AppBundle\Entity\Entidad U where  U.organismo=?1');
//        $query->setParameter(1,$organismo);
//        $listado_entities_organism=$query->getArrayResult();
//        $query=$em->createQueryBuilder();
//
//
//        $query ->select('COUNT(usuario)')
//            ->from('sisconeeAppBundle:Usuario','usuario');
//
//        $query ->where($query->expr()->in('usuario.entidad','?2'))->setParameter(2,$listado_entities_organism);
//        $query->andWhere($query->expr()->like('usuario.activo','?3')  )
//            ->setParameter(3,1);
//        if(!is_null($filter)){
//            $query->andWhere($query->expr()->like('usuario.nombre','?3'))
//                ->setParameter(3,'%'.$filter.'%');
//        }

        return $query->getQuery()->getSingleScalarResult();
        //return $query->getQuery()->getResult();
    }

    //method that return the count of user from an entity
    public function countOfUserBelongToEntity($entidad, $filter) {
        $em = $this->getEntityManager();
        $query = $em->createQuery('Select U.id from sisconee\AppBundle\Entity\Entidad U where U.entidad=?1');
        $query->setParameter(1,$entidad->getId());
        $listado_entities_subordinated=$query->getArrayResult();
        $query=$em->createQueryBuilder();


        $query ->select('COUNT(usuario)')
            ->from('sisconeeAppBundle:Usuario','usuario');

        $query ->where('usuario.idEntidad=?2')->setParameter(2,$entidad->getId());
        $query->andWhere($query->expr()->in('usuario.entidad','?3'))->setParameter(3,$listado_entities_subordinated);

        if(!is_null($filter)){
//            $query->andWhere($query->expr()->like('usuario.nombre','?4'))
            $query->andWhere(
                'usuario.nombre like ?4 OR
                                usuario.username like ?4 OR
                                usuario.rol like ?4 OR
                                usuario.correo like ?4'
            )
                ->setParameter(4,'%'.$filter.'%');
        }

        return $query->getQuery()->getSingleScalarResult();
        //return $query->getQuery()->getResult();
    }



}