<?php

namespace App\Form\Character;

use App\Provider\ClassProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ClassStep extends AbstractType
{
    private ClassProvider $classProvider;

    public function __construct(ClassProvider $classProvider)
    {
        $this->classProvider = $classProvider;
    }

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('class', ChoiceType::class, [
            'required' => true,
            'placeholder' => '- Choose an class -',
            'choice_loader' => new CallbackChoiceLoader([$this, 'getClasses']),
            'choice_label' => static function($class) {
                return (is_null($class) || is_array($class)) ? '' : $class->name;
            },
            'choice_value' => static function($class) {
                return (is_null($class) || is_array($class)) ? '' : $class->id;
            },
        ]);

        $builder->add('next', SubmitType::class, [
            'label' => 'Next',
        ]);

        $builder->add('previous', SubmitType::class, [
            'label' => 'Back'
        ]);
    }

    final public function getClasses(): array
    {
        return $this->classProvider->getElements();
    }
}