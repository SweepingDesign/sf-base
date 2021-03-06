<?php

namespace Sd\BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //            ->add('name', 'text', array('required'=>false))
        ->add('address', 'text')
        ->add('address2', 'text', array('required'=>false, 'label'=>' '))
        ->add('city', 'text')
        ->add('state', 'text', array('required'=>false))
        ->add('zip', 'text')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sd\BaseBundle\Document\Address'
        ));
    }

    public function getName()
    {
        return 'sd_base_address';
    }
}
