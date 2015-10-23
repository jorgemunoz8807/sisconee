<?php

namespace sisconee\AdministracionBundle\Form;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;


class EntidadType extends AbstractType
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
        //usuario autenticado
        $user = $this->securityContext->getToken()->getUser();
        if (!$user) {
            throw new \LogicException(
                'The EntityFormType cannot be used without an authenticated user!'
            );
        }

        $userOrganism = $user->getEntidad()->getOrganismo();
        $userEntity = $user->getEntidad() ;

        $builder

         ->add('organismo', 'entity', array(
            'class' =>  'sisconeeAppBundle:Organismo',
            'label'=> 'Organismo:',
            'query_builder' => function(EntityRepository $er) use ($userOrganism) {
                return $er->createQueryBuilder('o')
                    ->where('o.id = ?1')
                    ->setParameter(1, $userOrganism->getId());

            }
        ));

        if($this->securityContext->isGranted('ROLE_PLANIFICADOR_SUP'))
            {
               /*$builder ->add('idEntidad', 'entity', array(
                    'label' => 'Entidad padre:',
                    'class' => 'sisconeeAppBundle:Entidad',
                    'choices' => function(EntityRepository $er) use ($userOrganism) {
                            return $er->getAllEntitiesBelongTo($userOrganism->getId());}*/

                $builder ->add('entidadPadre', 'entity', array(
                    'label' => 'Entidad padre:',
                    'class' => 'sisconeeAppBundle:Entidad',
                    'query_builder' => function(EntityRepository $er) use ($userOrganism) {
                            return $er->createQueryBuilder('e')
                                ->where('e.organismo = ?1')
                                ->setParameter(1, $userOrganism);
                        }

                    ));
            }

            else  //ROLE_PLANIFICADOR_ENT
            {
                $builder->add ('entidadPadre', 'entity', array(
                        'label' => 'Entidad padre:',
                        'class' => 'sisconeeAppBundle:Entidad',
                        'query_builder' => function(EntityRepository $er) use ($userEntity) {
                            return $er->createQueryBuilder('e')
                                ->where('e.id = ?1')
                                ->setParameter(1, $userEntity);}
                    ));
            }


            $builder
            ->add('codReeup','text',array('label' => 'Código REEUP:'))
            ->add('nombre','text',array('label' => 'Nombre:'))
            ->add('siglas','text',array('label' => 'Siglas:'))


            ->add('nae', 'entity', array(
                    'label' => 'NAE:',
                    'class' => 'sisconeeAppBundle:NAE',
                ))



            ->add('correo','text',array('label' => 'Correo:'))
            ->add('telefono','text',array('label' => 'Teléfono:'))
            ->add('direccion','textarea',array('label' => 'Dirección:'))





        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\Entidad'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_entidad';
    }
}



