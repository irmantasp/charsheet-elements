<?php

namespace App\Model;

class Input
{
    public string $name;

    public string $gender;

    public string $playerName;

    public string $experience;

    public Attacks $attacks;

    public string $backstory;

    public BackgroundTrinket $backgroundTrinket;

    public string $backgroundTraits;

    public string $backgroundIdeals;

    public string $backgroundBonds;

    public string $backgroundFlaws;

    public Background $background;

    public Organization $organization;

    public string $additionalFeatures;

    public Currency $currency;

    public Notes $notes;

    public Quest $quest;
}