<?php

namespace Moneydrop\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Intitulé du thème: '))
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'theme';
    }
}