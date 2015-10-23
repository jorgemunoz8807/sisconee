<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\Date;

/**
 * TrazasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TrazasRepository extends EntityRepository
{
    /**
     * @param $tabla
     * @param $registro
     * @param $datos
     *
     * Persist log in "trazas" table
     */
    public function persistLog($operation, $tabla, $registro, $datos, $current_user)
    {

        $em = $this->getEntityManager();
        $traza = new Trazas();
        $traza->setOperacion($operation);
        $traza->setTabla($tabla);
        $traza->setRegistro($registro);
        $traza->setDatos($datos);
        $traza->setFechaHora(date_create());

        $traza->setIdUsuario($current_user);

        $em->persist($traza);
        $em->flush();
    }
}