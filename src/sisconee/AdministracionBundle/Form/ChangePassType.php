<?php

namespace sisconee\AdministracionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChangePassType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('oldPass', 'password', array('label' => 'Contraseña anterior'))
            ->add('newPass', 'repeated', array(
                'first_name' => 'pass',
                'second_name' => 'confirm',
                'type' => 'password',
                'invalid_message' => 'Las contraseñas deben coincidir',
                'required' => true,
                'first_options' => array('label' => "Contraseña"),
                'second_options' => array('label' => "Confirme la Contraseña")
            ))
            ->add('submit', 'submit', array('label' => 'Aceptar', 'attr' => array('class' => 'btn btn-primary')));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sisconee\AppBundle\Entity\ChangePass',
            'attr'=> array('id'=>'editPass-form')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sisconee_appbundle_changepass';
    }
}
