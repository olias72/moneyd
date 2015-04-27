<?php

namespace Moneydrop\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class QuestionEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('theme');
    }

    public function getName()
    {
        return 'editQuestion';
    }

    public function getParent()
    {
        return new QuestionType();
    }
}