<?php

namespace sisconee\AdministracionBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

class AddProvinciaFieldSubscriber implements EventSubscriberInterface
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

    private function addProvinciaForm($form, $provincia)
    {
        $form->add($this->factory->createNamed('provincia', 'entity', $provincia, array(
                    'class'         => 'sisconeeAppBundle:Provincia',
                    'mapped'        => false,
                    'empty_value'   => 'Provincia',
                    'auto_initialize'   => false,
                    'query_builder' => function (EntityRepository $repository) {
                        $qb = $repository->createQueryBuilder('provincia');

                        return $qb;
                    }
                )));
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        //$provincia = ($data->municipio) ? $data->municipio->getProvincia() : null ;
        $provincia =  null ;
        $this->addProvinciaForm($form, $provincia);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;
        $this->addProvinciaForm($form, $provincia);
    }
}