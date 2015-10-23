<?php

namespace sisconee\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanDiarioServicioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('week', 'hidden')
            ->add('month', 'hidden')
            ->add('year', 'hidden')
            ->add('serviceId', 'hidden')
            ->add('entityId', 'hidden')
            ->add('plans', 'collection', array('label' => 'Plan General:', 'type' => 'integer', 'required'=>false))
            ->add('hpPlans', 'collection', array('label' => 'Horario Pico :', 'type' => 'integer', 'required'=>false))
            ->add('save', 'button', array('label' => 'Actualizar', 'attr' => array('class' => 'btn btn-primary add-plan-btn')));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('attr' => array('id' => 'form_plans_day')

//            'data_class' => 'sisconee\AppBundle\Entity\LecturaDiariaServicio'
//            'data_class' => 'sisconee\AppBundle\Entity\PlanDayServices'

        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_lecturadiariaservicio';
    }
}
