<?php

namespace sisconee\AdministracionBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use sisconee\AppBundle\Entity\Provincia;

class AddMunicipioFieldSubscriber implements EventSubscriberInterface
{
    private $factory;

    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT     => 'preSubmit'
        );
    }

    private function addMunicipioForm($form, $provincia)
    {
        $form->add($this->factory->createNamed('idMunicipio','entity', null, array(
                    'class'         => 'sisconeeAppBundle:Municipio',
                    'empty_value'   => 'Municipio',
                    'auto_initialize'   => false,
                    'query_builder' => function (EntityRepository $repository) use ($provincia) {
                        $qb = $repository->createQueryBuilder('municipio')
                            ->innerJoin('provincia', 'Provincia');
                        if ($provincia instanceof Provincia) {
                            $qb->where('municipio.id_provincia = :provincia')
                                ->setParameter('provincia', $provincia);
                        } elseif (is_numeric($provincia)) {
                            $qb->where('provincia.id = :provincia')
                                ->setParameter('provincia', $provincia);
                        } else {
                            $qb->where('provincia.descripcion = :provincia')
                                ->setParameter('provincia', null);
                        }

                        return $qb;
                    }
                )));
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        //var_dump($data);exit();
        $form = $event->getForm();

        if (null === $data) {
            //echo'hhhhhhhhh';exit();
            return;
        }

        //$provincia = ($data->idMunicipio) ? $data->idMunicipio->getProvincia() : null ;
        $provincia =  null ;
        $this->addMunicipioForm($form, $provincia);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;
        $this->addMunicipioForm($form, $provincia);
    }
}