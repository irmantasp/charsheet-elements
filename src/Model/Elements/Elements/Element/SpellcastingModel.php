<?php

namespace App\Model\Elements\Elements\Element;

use App\Model\Elements\Elements\Element\Spellcasting\ExtendModel;
use App\Model\Elements\Elements\Element\Spellcasting\ListModel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("spellcasting")
 */
class SpellcastingModel
{

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $name;

    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    public string $ability;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $prepare;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $allowReplace;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $extend;

    /**
     * @var bool
     *
     * @Serializer\XmlAttribute()
     */
    public bool $all;

    /**
     * @var ExtendModel[]
     *
     * @Serializer\SerializedName("extend")
     * @Serializer\XmlList(inline=true, entry="extend")
     * @Serializer\Type("array<App\Model\Index\Elements\Element\Spellcasting\ExtendModel>")
     */
    public array $extends;

    /**
     * @var ListModel
     *
     * @Serializer\Type("App\Model\Index\Elements\Element\Spellcasting\ListModel")
     */
    public ListModel $list;

}