<?php

namespace App\Form\Character;

use App\Provider\BackgroundProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class BackgroundStep extends AbstractType
{
    private BackgroundProvider $backgroundProvider;

    public function __construct(BackgroundProvider $backgroundProvider)
    {
        $this->backgroundProvider = $backgroundProvider;
    }

    final public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('background', ChoiceType::class, [
            'required' => true,
            'placeholder' => '- Choose an background -',
            'choice_loader' => new CallbackChoiceLoader([$this, 'getBackgrounds']),
            'choice_label' => static function($background) {
                return (is_null($background) || is_array($background)) ? '' : $background->name;
            },
            'choice_value' => static function($background) {
                return (is_null($background) || is_array($background)) ? '' : $background->id;
            },
        ]);

        $builder->add('next', SubmitType::class, [
            'label' => 'Next',
        ]);

        $builder->add('previous', SubmitType::class, [
            'label' => 'Back'
        ]);
    }

    final public function getBackgrounds(): array
    {
        return $this->backgroundProvider->getElements();
    }
}