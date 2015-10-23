<?php
/**
 * Created by PhpStorm.
 * User: cmar
 * Date: 9/01/2015
 * Time: 14:11
 */

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class LecturaDiariaServicioRepository extends EntityRepository
{

    public function getLectura($day, $month, $anno, $id_servicio){
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();

        $fecha = date("Y-m-d",strtotime($anno.'/'.$month.'/'.$day));

        $query->select('registro')
            ->from('sisconeeAppBundle:LecturaDiariaServicio', 'registro')
            ->where('registro.idServicio = :idServicio')->setParameter('idServicio', $id_servicio)
            ->orderBy('registro.fecha','ASC')
            ->andWhere('registro.fecha = :fecha')->setParameter('fecha', $fecha);
        //->setParameters(array(1=> $id_servicio));

        $array = $query->getQuery()->getResult();
        if (count($array)==1)
            return $array[0];
        else
            return null;
    }

   public  function  getLecturas($month, $anno, $id_servicio){

       $em = $this->getEntityManager();
       $query = $em->createQueryBuilder();


       $fecha_inicial = date("Y-m-d",strtotime($anno.'/'.$month.'/01'));
       $fecha_final = date("Y-m-d",strtotime($anno.'/'.$month.'/31'));


       $query->select('registro')
           ->from('sisconeeAppBundle:LecturaDiariaServicio', 'registro')
           ->where('registro.idServicio = ?1')
           ->orderBy('registro.fecha','ASC')
           ->andWhere('registro.fecha >= ?2')
           ->andWhere('registro.fecha <= ?3')
           ->setParameters(array(1=> $id_servicio, 2=>$fecha_inicial, 3=>$fecha_final));
           //->setParameters(array(1=> $id_servicio));

       return  $query->getQuery()->getResult();
       //return $query->getResult();
   }

    public  function  getConsumoAcumuladoGeneral($month, $anno, $id_servicio){

        $em = $this->getEntityManager();



        $fecha_inicial = date("Y-m-d",strtotime($anno.'/'.$month.'/01'));
        $fecha_final = date("Y-m-d",strtotime($anno.'/'.$month.'/31'));

        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        $rsm->addScalarResult('cantidad', 'cantidad');
        $rsm->addScalarResult('cantidadHP', 'cantidadHP');

        $query = $em->createNativeQuery('Select SUM(consumo) as cantidad, SUM(consumo_horariopico) as cantidadHP
                                         FROM  lectura_diaria_servicio
                                         Where (id_servicio =:servicio) and (fecha >=:fecha_inicial) and (fecha <=:fecha_final)
                                         Group by id_servicio',$rsm);

        /*$query->select('registro,SUM(registro.plan)')
            ->from('sisconeeAppBundle:LecturaDiariaServicio', 'registro')
            ->where('registro.idServicio = ?1')
            ->andWhere('registro.fecha >= ?2')
            ->andWhere('registro.fecha <= ?3')
            ->groupBy('registro.id')*/
         $query->setParameters(array('servicio'=> $id_servicio, 'fecha_inicial'=>$fecha_inicial, 'fecha_final'=>$fecha_final));
        //->setParameters(array(1=> $id_servicio));

        $result =  $query->getResult();
        if (sizeof($result)>=1) { return $result ;}
          else {return array(0=>array('cantidad'=>0,'cantidadHP'=>0)); }

    }



}