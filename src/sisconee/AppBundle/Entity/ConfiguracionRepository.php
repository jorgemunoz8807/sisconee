<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 24/11/2014
 * Time: 9:50
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;


class ConfiguracionRepository extends EntityRepository
{

    /**
     * Get the configuration with greater year of a determinate organism
     * @param $idOrganismo
     * @return the last configuration
     */
    public function getLastConfiguration($idOrganismo) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select('config.id')
            ->from('sisconeeAppBundle:Configuracion', 'config')
            ->where('config.organismo = ?1')
            ->orderBy('config.periodoTrabajo', 'DESC')
            ->setMaxResults(1)
            ->setParameter(1, $idOrganismo);


        $result = $query->getQuery()->getResult();
        if (sizeof($result) >= 1) {
            return $this->findOneById ($result[0]);
        }
        return null;
    }

    /**
     * Get all configuration years for a determinate organism
     * @param $organismId The organism for filter
     * @return array All years
     */
    public function getAllConfigurations($organismId)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('c.plan, c.periodoTrabajo')
            ->from('sisconeeAppBundle:Configuracion', 'c')
            ->where('c.organismo = ?1')
            ->orderBy('c.periodoTrabajo', 'DESC')
            ->setParameter(1, $organismId);

       return $query->getQuery()->getResult();
    }

    /**
     * Get configuration by year and organism id
     * @param $organismId
     * @param $year
     * @return null
     */
    public function getConfigurationByYear ($organismId, $year)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('c.id')
            ->from('sisconeeAppBundle:Configuracion', 'c')
            ->where('c.organismo =:organism')->setParameter('organism', $organismId)
            ->andWhere('c.periodoTrabajo = :year')->setParameter('year', $year);

        $result = $query->getQuery()->getResult();
        if (sizeof($result) >= 1) {
            return $this->findOneById( $result[0] );
        }
        return null;
    }
}