<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class CharacterType extends AbstractType
{

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $data = $builder->getData();

        $values = [];
        if (isset($data['request'])) {
            $request = $data['request'];
            unset($data['request']);
            $values = $request->get('character');
        }

        $elements = $data;
        unset($data);

        $builder->add('abilities_method', ChoiceType::class, [
            'required' => true,
            'placeholder' => '- Choose an ability choice method -',
            'choices' => [
                'Standard array' => 'standard_array',
                'Point Buy' => 'point_buy',
                'Roll' => 'roll',
            ],
        ]);

        if (isset($values['abilities_method'])) {
            $abilities = ['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma'];
            switch ($values['abilities_method']) {
                case 'standard_array':
                    $choices = [15,14,13,12,10,8];
                    foreach ($abilities as $ability) {
                        $builder->add($ability, ChoiceType::class, [
                            'required' => true,
                            'placeholder' => ' - ',
                            'choices' => $choices
                        ]);
                    }
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
            }
        }

        if (isset($values['abilities'])) {
            $builder->add('race', ChoiceType::class, [
                'required' => true,
                'placeholder' => '- Choose an race -',
                'choices' => $elements['race'],
                'choice_label' => static function($race) {
                    return (is_null($race) || is_array($race)) ? '' : $race->name;
                },
                'choice_value' => static function($race) {
                    return (is_null($race) || is_array($race)) ? '' : $race->id;
                },
            ]);
        }

        if (isset($values['race'])) {
            $builder->add('class', ChoiceType::class, [
                'required' => true,
                'placeholder' => '- Choose an class -',
                'choices' => $elements['class'],
                'choice_label' => static function($class) {
                    return (is_null($class) || is_array($class)) ? '' : $class->name;
                },
                'choice_value' => static function($class) {
                    return (is_null($class) || is_array($class)) ? '' : $class->id;
                },
            ]);
        }

        if (isset($values['race'], $values['class']))  {
            $builder->add('background', ChoiceType::class, [
                'required' => true,
                'placeholder' => '- Choose an background -',
                'choices' => $elements['background'],
                'choice_label' => static function($background) {
                    return (is_null($background) || is_array($background)) ? '' : $background->name;
                },
                'choice_value' => static function($background) {
                    return (is_null($background) || is_array($background)) ? '' : $background->id;
                },
            ]);
        }

        $builder->add('submit', SubmitType::class, [
            'label' => 'Continue',
        ]);
    }
}