<?php

namespace App\Form\Character;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CharacterStep extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, [
            'required' => true,
        ]);

        $builder->add('category', TextType::class, [
            'required' => false,
            'empty_data' => '',
        ]);

        $builder->add('addCharacter', SubmitType::class, [
            'label' => 'Add new character'
        ]);
    }
}