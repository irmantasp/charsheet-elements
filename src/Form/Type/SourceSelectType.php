<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SourceSelectType extends AbstractType
{

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $sources = $builder->getData();

        $builder->add('sources', ChoiceType::class, [
            'expanded' => true,
            'multiple' => true,
            'required' => true,
            'choices' => $sources,
            'choice_label' => static function ($choice) {
                $label = $choice->getName();
                if (!is_null($label)) {
                    return $label;
                }

                return $choice->getFilePath();
            },
        ]);

        $builder->add('submit', SubmitType::class, [
            'label' => 'Save',
        ]);
    }
}