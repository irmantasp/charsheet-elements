<?php

namespace App\Item;

use App\Property\FileInterfaceTrait;

class ListItem
{
    use FileInterfaceTrait;

    public ?string $name = null;

    public ?string $description = null;

    public ?string $author = null;

    public ?string $authorUrl = null;

    public ?string $version = null;

    public function __construct(array $values)
    {
        foreach ($values as $property => $value) {
            if (property_exists(static::class, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    /**
     * @return string|null
     */
    final public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ListItem
     */
    final public function setName(?string $name): ListItem
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    final public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return ListItem
     */
    final public function setDescription(?string $description): ListItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    final public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     * @return ListItem
     */
    final public function setAuthor(?string $author): ListItem
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string|null
     */
    final public function getAuthorUrl(): ?string
    {
        return $this->authorUrl;
    }

    /**
     * @param string|null $authorUrl
     * @return ListItem
     */
    final public function setAuthorUrl(?string $authorUrl): ListItem
    {
        $this->authorUrl = $authorUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    final public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return ListItem
     */
    final public function setVersion(?string $version): ListItem
    {
        $this->version = $version;
        return $this;
    }


}