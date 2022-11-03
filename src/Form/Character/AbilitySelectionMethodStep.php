<?php

namespace App\Form\Character;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class AbilitySelectionMethodStep extends AbstractType
{

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('abilitySelectMethod', ChoiceType::class, [
            'required' => true,
            'placeholder' => '- Choose an ability choice method -',
            'choices' => [
                'Standard array' => 'standard_array',
                'Point Buy' => 'point_buy',
                'Roll' => 'roll',
            ],
        ]);

        $builder->add('next', SubmitType::class, [
            'label' => 'Next',
        ]);

        $builder->add('previous', SubmitType::class, [
            'label' => 'Back'
        ]);
    }
}