<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 26/01/2015
 * Time: 12:08
 */
namespace sisconee\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlanMensualType extends AbstractType
{
    private $serviceId;
    private $entityId;
    private $hasHpPlan;

    public function __construct($entityId, $serviceId, $hasHpPlan)
    {
        $this->serviceId = $serviceId;
        $this->entityId = $entityId;
        $this->hasHpPlan = $hasHpPlan;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('plans', 'collection', array('label'=>'Planes generales:', 'type'=>'integer', 'options'=>array('required'=>false, 'attr'=>array('class'=>'plan-box'))));
         if($this->hasHpPlan)
             $builder->add('hpPlans', 'collection', array('label'=>'Planes Horario Pico:', 'type'=>'integer', 'options'=>array('required'=>false, 'attr'=>array('class'=>'plan-box'))));
         $builder
            ->add('save', 'submit', array('label' => 'Actualizar', 'attr'=>array('class'=>'btn btn-primary add-plan-btn')))
            ->add('serviceId', 'hidden', array('mapped'=>false, 'data'=>$this->serviceId))
            ->add('entityId', 'hidden', array('mapped'=>false, 'data'=>$this->entityId))

            /*foreach ($data as $name => $value) {
                             $form->add($this->factory->createNamed($this->type, $name, $value, array_replace(array(
                             'property_path' => '['.$name.']',), $this->options)));
             }   */
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'attr' => array('id'=>'mensualPlanificationForm')
            ));


    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_planesmensuales';
    }
}