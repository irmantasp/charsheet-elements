<?php

namespace App\Model;

class Item
{

    public string $identifier;

    public string $name;

    public string $id;

    public Equipped $equipped;

    public bool $attunement;

    public Details $details;
}