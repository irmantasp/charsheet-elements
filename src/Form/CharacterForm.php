<?php

namespace App\Form;

use App\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterForm extends AbstractType
{

    final public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined('operation');
        $resolver->setAllowedTypes('operation', 'string');
        $resolver->setAllowedValues('operation', ['add', 'edit', 'delete']);
        $resolver->setDefault('operation', null);
        $resolver->setRequired('operation');
    }

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var CharacterForm $character */
        $character = $builder->getData();
        if (in_array($options['operation'], ['add', 'edit'])) {
            $builder->add('name', TextType::class, [
                'required' => true,
            ]);

            $builder->add('category', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ]);
        }

        $submitLabel = match ($options['operation']) {
            'edit' => 'Save this character',
            'delete' => 'Delete this character',
            default => 'Add new character',
        };

        $builder->add('submit', SubmitType::class, [
            'label' => $submitLabel,
        ]);

        $builder->add('cancel', SubmitType::class, [
            'label' => 'Cancel',
        ]);
    }

    final public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['operation'] = $options['operation'];
    }
}