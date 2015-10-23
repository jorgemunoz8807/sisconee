<?php

namespace sisconee\AdministracionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfiguracionType extends AbstractType
{

    private $organismId;
    private $doctrine;
    private $mode;

    public function __construct($organismId,  $doctrine, $mode = 0)
    {
        $this->organismId  = $organismId;
        $this->doctrine = $doctrine;
        $this->mode = $mode;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->mode == 0) {
            $em = $this->doctrine->getManager();
            $configurations = $em->getRepository('sisconeeAppBundle:Configuracion')->getAllConfigurations($this->organismId->getId());

            $choices = [];

            foreach ($configurations as $c) {
                $choices[$c['periodoTrabajo']] = $c['periodoTrabajo'];
            }

            $builder
                ->add('periodoTrabajo', 'choice', array(
                    'label' => 'Período de Trabajo:',
                    'choices' => $choices
                ));
        }
        else{
            $builder
                ->add('periodoTrabajo','integer',array('label' => 'Período de Trabajo:'));
        }
        $builder
            ->add('plan', 'integer', array('label' => 'Plan:'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\Configuracion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_configuracion';
    }
}
