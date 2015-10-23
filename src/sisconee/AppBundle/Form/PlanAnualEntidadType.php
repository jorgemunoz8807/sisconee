<?php

namespace sisconee\AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use sisconee\AppBundle\Entity\PlanRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use sisconee\AppBundle\Entity\EntidadRepository;

class PlanAnualEntidadType extends AbstractType
{
    private $parentEntity;
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
       // $builder->add('field_name', 'text', array('label' => 'Field Label', 'attr' => array('class' => 'fieldClass')));

        $em = $this->doctrine->getManager();
        $parentId = $this->parentEntity->getId();
        //$subentities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedTo($this->parentEntity);
        $subentities = $em->getRepository('sisconeeAppBundle:Entidad')->findAllSubordinatedToWithoutPlan($this->parentEntity);

        $builder
            ->add('entidad', null, array(
                    'label'=>'Entidades:',
                    'attr'=> array('class'=> 'subordinates'),
                    //'choices'=>$this->subEntities,
                    'choices'=> $subentities,
                    'empty_value'=>false
                ))
            ->add('plan', null , array('label'=>'Plan:'))

            ->add('parent', 'hidden', array('mapped'=>false, 'data'=>$parentId))

            ->add('save', 'submit', array('label' => 'Crear Plan', 'attr'=>array('class'=>'btn btn-default add-plan-btn')))

            //->add('anno')
            /*->add('entidad', 'entity', array(
                    'label' => 'Entidad',
                    'class' => 'sisconeeAppBundle:Entidad',
                    'choices' => $entities))*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\PlanAnualEntidad',
             'attr' => array('id'=>'annualPlanificationForm', 'class' => 'form_planification form_hidden')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_plananualentidad';
    }
}
