<?php

namespace sisconee\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanAnualServicioType extends AbstractType
{
    private $parentEntity;
    //private $subEntities;
    private $doctrine;

    public function __construct($parentEntity, /*$subEntities*/ $doctrine)
    {
        $this->parentEntity  = $parentEntity;
        // $this->subEntities = $subEntities;
        $this->doctrine = $doctrine;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $em = $this->doctrine->getManager();
        $services = $em->getRepository('sisconeeAppBundle:Servicio')->servicesWithoutPlan($this->parentEntity);

        $builder
            ->add('servicio', null, array(
                'label'=>'Servicios:',
                'attr'=> array('class'=> 'subordinates'),
                //'choices'=>$this->subEntities,
                'choices'=> $services,
                'empty_value'=>false
            ))
            ->add('parent', 'hidden', array('mapped'=>false, 'data'=>$this->parentEntity->getId()))
            ->add('plan')
            ->add('save', 'submit', array('label' => 'Crear Plan', 'attr'=>array('class'=>'btn btn-default add-plan-btn')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\PlanAnualServicio',
            'attr' => array('id'=>'annualPlanificationForm','class' => 'form_planification form_hidden')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_plananualservicio';
    }
}
