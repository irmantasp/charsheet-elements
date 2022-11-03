<?php

namespace App\Form\Character;

use App\Provider\RaceProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class RaceStep extends AbstractType
{
    private RaceProvider $raceProvider;

    public function __construct(RaceProvider $raceProvider)
    {
        $this->raceProvider = $raceProvider;
    }

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('race', ChoiceType::class, [
            'required' => true,
            'placeholder' => '- Choose an race -',
            'choice_loader' => new CallbackChoiceLoader([$this, 'getRaces']),
            'choice_label' => static function($race) {
                return (is_null($race) || is_array($race)) ? '' : $race->name;
            },
            'choice_value' => static function($race) {
                return (is_null($race) || is_array($race)) ? '' : $race->id;
            },
        ]);

        $builder->add('next', SubmitType::class, [
            'label' => 'Next',
        ]);

        $builder->add('previous', SubmitType::class, [
            'label' => 'Back'
        ]);
    }

    final public function getRaces(): array
    {
        return $this->raceProvider->getElements();
    }
}