<?php

namespace sisconee\AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use sisconee\AppBundle\Entity\PlanRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use sisconee\AppBundle\Entity\EntidadRepository;

class EditPlanAnualEntidadType extends AbstractType
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
            ->add('plan', null,array('label'=>'Plan:'))
            ->add('entity', 'hidden', array('mapped'=>false, 'data'=>$this->parentEntityId))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\PlanAnualEntidad'//,
             //'attr' => array('class' => 'form_planification form_hidden')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_editplanannualentidad';
    }
}
