<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EmpleadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('fechaNacimiento', DateType::class, array(                                
                "widget"=>"single_text",                                                
                "attr" => array("class"=>"form-control","placeholder"=>"2017-09-11", "title"=>"Ingrese la fecha de nacimiento")))                                
            ->add('profesion')
            ->add('direccion')
            ->add('telefono')
            ->add('userName')
            ->add('pass')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Empleado'
        ));
    }
}
