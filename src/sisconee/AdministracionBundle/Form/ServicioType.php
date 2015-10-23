<?php

namespace sisconee\AdministracionBundle\Form;

//use sisconee\AppBundle\Entity\Servicio;
use sisconee\AppBundle\Entity\Provincia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityRepository;


class ServicioType extends AbstractType
{

    private $securityContext;



    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;


    }

        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('nombre', 'text',array('label' => 'Nombre'))
            ->add('codClienteEE', 'text',array('label' => 'Código cliente'))
            ->add('codRutaFolio', 'text',array('label' => 'Código Ruta-Folio'))
            ->add('horarioPico', 'checkbox',array('label' => 'Plan Horario Pico  ', 'required'=>false))
            ->add('activo','checkbox',array ('label' =>'Activo  ', 'required'=>false))
            ->add('entidad', null ,array('label' => 'Entidad', 'required'=>true))
            ->add('tipoServicio', null,array('label' => 'Tipo de servicio', 'required'=>true));

        $factory = $builder->getFormFactory();
        $municipioSubscriber = new AddMunicipioFieldSubscriber($factory);
        $builder->addEventSubscriber($municipioSubscriber);
        $provinciaSubscriber = new AddProvinciaFieldSubscriber($factory);
        $builder->addEventSubscriber($provinciaSubscriber);*/


        /*$builder
            ->add('idProvincia', 'entity', array(
                    'class' => 'sisconeeAppBundle:Provincia',
                    'property'=>'descripcion',
                    'empty_value' => '',
                ));
        ;*/

        //$repository = $this->getDoctrine()->getRepository('sisconeeAppBundle:Municipio');

        /*$formModifier = function (FormInterface $form, Provincia $provincia = null) {
            $municipios = null === $provincia ? array() : $provincia->getMunicipios();
            //$municipios = array ('1'=>'municipio1','2'=>'municipio2');
            $form->add('idMunicipio', 'entity', array(
                    'class' => 'sisconeeAppBundle:Municipio',
                    'empty_value' => '',
                    'choices' => $municipios,
                ));
        };

        $builder->addEventListener(FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
             // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getIdProvincia());
            }
        );
        $builder->get('idProvincia')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
            // It's important here to fetch $event->getForm()->getData(), as
            // $event->getData() will get you the client data (that is, the ID)
                $provincia = $event->getForm()->getData();
            // since we've added the listener to the child, we'll have to pass on
            // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $provincia);
            }
        );*/

        /*$builder->addEventSubscriber(new AddMunicipioFieldSubscriber());

        $builder->addEventSubscriber(new AddProvinciaFieldSubscriber());*/

        // usuario autenticado
        $user = $this->securityContext->getToken()->getUser();
        if (!$user) {
            throw new \LogicException(
                'The EntityFormType cannot be used without an authenticated user!'
            );
        }


        $builder
            ->add('nombre', 'text',array('label' => 'Nombre'))
            ->add('codClienteEE', 'text',array('label' => 'Código cliente en la empresa eléctrica(CEE)'))
            ->add('codRutaFolio', 'text',array('label' => 'Código Ruta-Folio (CRF)'))
            ->add('horarioPico', 'checkbox',array('label' => 'Con plan para el Horario Pico  ', 'required'=>false))
            ->add('entidad', 'entity', array(
                    'label' => 'Entidad',
                    'class' => 'sisconeeAppBundle:Entidad',
                    'query_builder' => function(EntityRepository $er) use ($user) {
                        if ($user->getRol()!='ROLE_PLANIFICADOR_SUP') {
                            $entityOfAuthenticatedUser = $er->findBy(array('id' => $user->getEntidad()));

                            return $er->createQueryBuilder('e')
                                ->where('e.entidadPadre = ?1')
                                ->orWhere('e.id = ?1')
                                ->orderBy('e.nombre', 'DESC')
                                ->setParameter(1, $entityOfAuthenticatedUser);
                        }
                        else return $er->createQueryBuilder('e');//falta filtrar por organismo
                    }
                ))

            //->add('idEntidad', null ,array('label' => 'Entidad', 'required'=>true))
            ->add('tipoServicio', null,array('label' => 'Tipo de servicio', 'required'=>true))
            //->add('provincia', null,array('label' => 'Provincia', 'required'=>true));
            ->add('provincia', 'entity', array('label' => 'Provincia',
                    'class' => 'sisconeeAppBundle:Provincia',
                    //'empty_value'=>'',
                    'query_builder' => function (EntityRepository $er) {
                        $er->findAll();
                        return $er->createQueryBuilder('e');}));
            /*->add('idMunicipio', 'entity', array('label' => 'Municipio',
                                                  'class' => 'sisconeeAppBundle:Municipio',
                                                  'query_builder' => function (EntityRepository $er) {
                                                      $er->findAll();
                                                      return $er->createQueryBuilder('e');}))*/
            //->add('idMunicipio', null,array('label' => 'Municipio', 'required'=>true));
            /*$builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();

                    // this would be your entity, i.e. SportMeetup
                    $data = $event->getData();

                    $provincia = $data->getIdProvincia();
                    $municipios = null === $provincia ? array() : $provincia->getAvailableMunicipios();

                    $form->add('idMunicipio', 'entity', array(
                            'class'       => 'sisconeeAppBundle:Municipio',
                            'empty_value' => '',
                            'choices'     => $municipios,
                        ));
                }
            );*/
        $formModifier = function (FormInterface $form, Provincia $provincia) {
            $municipios = null === $provincia ? array() : $provincia->getMunicipios();
            $form->add('municipio', 'entity', array(
                    'class'       => 'sisconeeAppBundle:Municipio',
                    'empty_value' => '',
                    'label'=>'Municipio',
                    'choices'     => $municipios,
                ));
        };

        $builder->addEventListener(FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
           // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                //var_dump($data);


                $formModifier($event->getForm(), $data->getProvincia());
            }
        );

        $builder->get('provincia')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
             // It's important here to fetch $event->getForm()->getData(), as
            // $event->getData() will get you the client data (that is, the ID)
                $provincia = $event->getForm()->getData();
            // since we've added the listener to the child, we'll have to pass on
            // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $provincia);
            }
        );


        /*$factory = $builder->getFormFactory();
        $refreshMunicipio = function (FormInterface $form, $provincia) use ($factory) {
            $form->add($factory->createNamed('entity', 'municipio', null, array(
                        'class'         => 'Entity:Municipio',
                        'property'      => 'descripcion',
                        'label'         => 'Municipio',
                        'query_builder' => function (EntityRepository $repository) use ($provincia) {
                            $qb = $repository->createQueryBuilder('municipio')
                                ->select(array('descripcion'))
                                ->innerJoin('municipio.id_provincia', 'provincia');

                            if($provincia instanceof Provincia) {
                                $qb = $qb->where('municipio.id_provincia = :provincia')
                                    ->setParameter('provincia', $provincia);
                            } elseif(is_numeric($provincia)) {
                                $qb = $qb->where('provincia.id = :provincia_id')
                                    ->setParameter('provincia_id', $provincia);
                            } else {
                                $qb = $qb->where('provincia.id = 1');
                            }

                            return $qb;
                        }
                    )));
        };

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($refreshMunicipio) {
                $form = $event->getForm();
                $data = $event->getData();

                if($data == null)
                    return;  //As of beta2, when a form is created setData(null) is called first

                if($data instanceof Servicio) {
                    $refreshMunicipio($form, $data->getIdMunicipio()->getIdProvincia());
                }
            });

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($refreshMunicipio) {
                $form = $event->getForm();
                $data = $event->getData();

                if(array_key_exists('idProvincia', $data)) {
                    $refreshMunicipio($form, $data['idProvincia']);
                }
            });*/

        /*$builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
         // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                $provincia = $data->getProvincia();
                $municipios = null === $provincia ? array() : $provincia->getMunicipios();
                $form->add('idMunicipio', 'entity', array(
                        'class' => 'sisconeeAppBundle:Municipio',
                        'empty_value' => '',
                        'choices' => $municipios,
                    ));
            }
        );*/
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\Servicio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_servicio';
    }
}
