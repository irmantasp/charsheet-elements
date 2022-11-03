<?php

namespace App\Form\Character;

use App\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class AbilitiesStep extends AbstractType
{

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Character $character */
        $character = $builder->getData();

        $abilities = ['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma'];

        switch ($character->getAbilitySelectMethod()) {
            default:
            case 'standard_array':
                $points = [15,14,13,12,10,8];
                $choices = [];
                foreach ($points as $point) {
                    $choices[$point] = $point;
                }
                foreach ($abilities as $ability) {
                    $builder->add($ability, ChoiceType::class, [
                        'required' => true,
                        'placeholder' => ' - ',
                        'choices' => $choices
                    ]);
                }
                break;
            case 'point_buy':
                foreach ($abilities as $ability) {
                    $builder->add($ability, IntegerType::class, [
                        'required' => true,
                        'empty_data' => 8,
                        'attr' => [
                            'min' => 8,
                            'step' => 1,
                            'max' => 15,
                        ],
                    ]);
                }
                break;
            case 'roll':
                foreach ($abilities as $ability) {
                    $builder->add($ability, IntegerType::class, [
                        'required' => true,
                        'attr' => [
                            'min' => 3,
                            'step' => 1,
                            'max' => 18,
                        ],
                    ]);
                }
                break;
        }

        $builder->add('next', SubmitType::class, [
            'label' => 'Next',
        ]);

        $builder->add('previous', SubmitType::class, [
            'label' => 'Back'
        ]);
    }
}