<?php

namespace App\Entity;

class Character
{
    public ?string $uuid = null;

    public string $name;

    public string $category;

    public string $abilitySelectMethod;

    public int $strength;

    public int $dexterity;

    public int $constitution;

    public int $intelligence;

    public int $wisdom;

    public int $charisma;

    public string $race;

    public string $class;

    public string $background;

    /**
     * @return string|null
     */
    final public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return Character
     */
    final public function setUuid(?string $uuid): Character
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    final public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Character
     */
    final public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    final public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Character
     */
    final public function setCategory(string $category): Character
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    final public function getAbilitySelectMethod(): string
    {
        return $this->abilitySelectMethod;
    }

    /**
     * @param string $abilitySelectMethod
     * @return Character
     */
    final public function setAbilitySelectMethod(string $abilitySelectMethod): Character
    {
        $this->abilitySelectMethod = $abilitySelectMethod;
        return $this;
    }

    /**
     * @return int
     */
    final public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     * @return Character
     */
    final public function setStrength(int $strength): Character
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    final public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * @param int $dexterity
     * @return Character
     */
    final public function setDexterity(int $dexterity): Character
    {
        $this->dexterity = $dexterity;
        return $this;
    }

    /**
     * @return int
     */
    final public function getConstitution(): int
    {
        return $this->constitution;
    }

    /**
     * @param int $constitution
     * @return Character
     */
    final public function setConstitution(int $constitution): Character
    {
        $this->constitution = $constitution;
        return $this;
    }

    /**
     * @return int
     */
    final public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @param int $intelligence
     * @return Character
     */
    final public function setIntelligence(int $intelligence): Character
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    /**
     * @return int
     */
    final public function getWisdom(): int
    {
        return $this->wisdom;
    }

    /**
     * @param int $wisdom
     * @return Character
     */
    final public function setWisdom(int $wisdom): Character
    {
        $this->wisdom = $wisdom;
        return $this;
    }

    /**
     * @return int
     */
    final public function getCharisma(): int
    {
        return $this->charisma;
    }

    /**
     * @param int $charisma
     * @return Character
     */
    final public function setCharisma(int $charisma): Character
    {
        $this->charisma = $charisma;
        return $this;
    }

    /**
     * @return string
     */
    final public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @param string $race
     * @return Character
     */
    final public function setRace(string $race): Character
    {
        $this->race = $race;
        return $this;
    }

    /**
     * @return string
     */
    final public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     * @return Character
     */
    final public function setClass(string $class): Character
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    final public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * @param string $background
     * @return Character
     */
    final public function setBackground(string $background): Character
    {
        $this->background = $background;
        return $this;
    }
}