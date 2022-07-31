<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Discriminator;
use JMS\Serializer\Annotation\XmlDiscriminator;

/**
 * @Discriminator(field="type", map = {
 *     "Ability Score Improvement": "App\Model\Element\AbilityScoreImprovement",
 *     "Archetype": "App\Model\Element\Archetype",
 *     "Archetype Feature": "App\Model\Element\ArchetypeFeature",
 *     "Armor": "App\Model\Element\Armor",
 *     "Background": "App\Model\Element\Background",
 *     "Background Feature": "App\Model\Element\BackgroundFeature",
 *     "Background Variant": "App\Model\Element\BackgroundVariant",
 *     "Class": "App\Model\Element\ClassElement",
 *     "Class Feature": "App\Model\Element\ClassFeature",
 *     "Companion": "App\Model\Element\Companion",
 *     "Companion Action": "App\Model\Element\CompanionAction",
 *     "Companion Reaction": "App\Model\Element\CompanionReaction",
 *     "Companion Trait": "App\Model\Element\CompanionTrait",
 *     "Dragonmark": "App\Model\Element\Dragonmark",
 *     "Deity": "App\Model\Element\Deity",
 *     "Feat": "App\Model\Element\Feat",
 *     "Feat Feature": "App\Model\Element\FeatFeature",
 *     "Grants": "App\Model\Element\Grants",
 *     "Information": "App\Model\Element\Information",
 *     "Internal": "App\Model\Element\Internal",
 *     "Item": "App\Model\Element\Item",
 *     "Language": "App\Model\Element\Language",
 *     "Magic Item": "App\Model\Element\MagicItem",
 *     "Option": "App\Model\Element\Option",
 *     "Proficiency": "App\Model\Element\Proficiency",
 *     "Race": "App\Model\Element\Race",
 *     "Racial Trait": "App\Model\Element\RacialTrait",
 *     "Race Variant": "App\Model\Element\RaceVariant",
 *     "Rule": "App\Model\Element\Rule",
 *     "Source": "App\Model\Element\Source",
 *     "Spell": "App\Model\Element\Spell",
 *     "Sub Race": "App\Model\Element\SubRace",
 *     "Support": "App\Model\Element\Support",
 *     "Vision": "App\Model\Element\Vision",
 *     "Weapon": "App\Model\Element\Weapon",
 *     "Weapon Property": "App\Model\Element\WeaponProperty",
 * })
 * @XmlDiscriminator(attribute=true)
 */
abstract class Element implements ElementInterface
{

    /**
     * @Serializer\XmlAttribute
     */
    public string $name;

    /**
     * @Serializer\XmlAttribute
     */
    public string $source;

    /**
     * @Serializer\XmlAttribute
     */
    public string $id;

    /**
     * @Serializer\Type("App\Model\Compendium")
     * @Serializer\SkipWhenEmpty
     *
     * @var Compendium
     */
    public Compendium $compendium;

    /**
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     */
    public string $supports;

    /**
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     */
    public string $requirements;

    /**
     * @Serializer\Type("HTML")
     * @Serializer\SkipWhenEmpty
     */
    public string $description;

    /**
     * @Serializer\Type("App\Model\Sheet")
     * @Serializer\SkipWhenEmpty
     *
     * @var Sheet
     */
    public Sheet $sheet;

    /**
     * @Serializer\Type("array<App\Model\Setter>")
     * @Serializer\XmlList(entry="set")
     * @Serializer\SkipWhenEmpty
     *
     * @var Setter[]
     */
    public array $setters;

    /**
     * @Serializer\Type("App\Model\Spellcasting")
     * @Serializer\SkipWhenEmpty
     */
    public ?Spellcasting $spellcasting;

    /**
     * @Serializer\Type("App\Model\Multiclass")
     * @Serializer\SkipWhenEmpty
     */
    public Multiclass $multiclass;

    /**
     * @Serializer\Type("array<App\Model\Rule>")
     * @Serializer\XmlList(entry="grant|select|stat")
     * @Serializer\SkipWhenEmpty
     */
    public array $rules;

    public ?IndexType $indexType;

}