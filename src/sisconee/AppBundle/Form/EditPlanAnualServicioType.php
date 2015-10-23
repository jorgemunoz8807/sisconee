<?php

namespace sisconee\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditPlanAnualServicioType extends AbstractType
{

    private $parentEntityId;

    public function __construct($parentEntityId)
    {
        $this->$parentEntityId = $parentEntityId;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('plan',null,array('label'=>'Plan:'))
            ->add('entity', 'hidden', array('mapped'=>false, 'data'=>$this->parentEntityId));
//            ->add('save', 'submit', array('label'=>'Actualizar'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\PlanAnualServicio',
            'attr' => array('class' => 'form_planification form_hidden')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_editplananualservicio';
    }
}
