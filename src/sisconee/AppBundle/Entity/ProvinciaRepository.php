<?php
/**
 * Created by PhpStorm.
 * User: yarima
 * Date: 23/01/2015
 * Time: 11:48
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProvinciaRepository  extends EntityRepository
{
    //devuelve todas las provincias de la entidad mas las de sus hijas
    public  function  getProvinciasByRoleENT ( $idEntityUser)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();

        $queryBuilder ->select ('p')
            ->from('sisconeeAppBundle:Entidad','e')
            ->innerJoin('sisconeeAppBundle:Provincia','p','With','e.provincia = p.id')
            ->where('e.entidadPadre=?1')
            ->orWhere('e.id=?2')
            ->setParameters(array(1=>$idEntityUser, 2=>$idEntityUser));
        //aqui falta incluir la propia entidad.. where entidad.id = $idEntityUser que da error

        return  $queryBuilder->getQuery()->getResult();
    }

    //devuelvela
    /**
     * @param $idEntityUser
     * @return array
     */
    public  function  getProvinciasByRoleSER ( $idEntityUser)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder();

        $queryBuilder ->select ('p')
            ->from('sisconeeAppBundle:Entidad','e')
            ->innerJoin('sisconeeAppBundle:Provincia','p','With','e.provincia = p.id')
            ->where('e.id=?1')
            ->setParameter(1,$idEntityUser);

        return  $queryBuilder->getQuery()->getResult();
    }



} 