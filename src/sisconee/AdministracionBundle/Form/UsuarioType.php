<?php



namespace sisconee\AdministracionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityRepository;

class UsuarioType extends AbstractType
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

        $user = $this->securityContext->getToken()->getUser();
        if (!$user) {
            throw new \LogicException(
                'The EntityFormType cannot be used without an authenticated user!'
            );
        }
        $builder
            ->add('nombre', 'text')
            ->add('correo', 'email')
            ->add('username', 'text', array('label' => 'Usuario'))
            ->add('password', 'repeated', array(
                'first_name' => 'pass',
                'second_name' => 'confirm',
                'type' => 'password',
                'invalid_message' => 'Las contraseñas deben coincidir',
                'required' => true,
                'first_options' => array('label' => "Contraseña"),
                'second_options' => array('label' => "Confirme la Contraseña")
            ))
            ->add('activo');


        if ($this->securityContext->isGranted('ROLE_PLANIFICADOR_SUP')) {
            $builder->add(
                'rol',
                'choice', array(
                    'choices' => array(
                        'ROLE_PLANIFICADOR_SUP' => 'Planificador Superior',
                        'ROLE_PLANIFICADOR_ENT' => 'Planificador Entidad',
                        'ROLE_PLANIFICADOR_SER' => 'Planificador Servicio',
                        'ROLE_REGISTRADOR_SER' => 'Registrador Servicio',
                        'ROLE_SUPERVISOR_SUP' => 'Supervisor Superior',
                        'ROLE_SUPERVISOR_ENT' => 'Supervisor Entidad',

                    )
                )
            );
        }
        if ($this->securityContext->isGranted('ROLE_PLANIFICADOR_ENT')) {
            $builder->add(
                'rol',
                'choice', array(
                    'choices' => array(

                        'ROLE_PLANIFICADOR_ENT' => 'Planificador Entidad',
                        'ROLE_PLANIFICADOR_SER' => 'Planificador Servicio',
                        'ROLE_REGISTRADOR_SER' => 'Registrador Servicio',
                        'ROLE_SUPERVISOR_ENT' => 'Supervisor Entidad',

                    )
                )
            );
        }

        $builder
            //->add('salt')
//                 ->add('idEntidad');

            ->add('entidad', 'entity', array(


                'label' => 'Entidad',


                'class' => 'sisconeeAppBundle:Entidad',


                'query_builder' => function (EntityRepository $er) use ($user) {
                    if ($user->getRol() != 'ROLE_PLANIFICADOR_SUP') {
                        $entityOfAuthenticatedUser = $er->findBy(array('id' => $user->getEntidad()));
                        return $er->createQueryBuilder('e')
                            ->where('e.entidadPadre = ?1')
                            ->orWhere('e.id = ?1')
                            ->orderBy('e.nombre', 'DESC')
                            ->setParameter(1, $entityOfAuthenticatedUser);
                    } else return $er->createQueryBuilder('e');//falta filtrar por organismo
                }
            ));


    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_usuario';
    }
}
