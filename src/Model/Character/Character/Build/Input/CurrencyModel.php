<?php

namespace App\Model\Character\Character\Build\Input;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('currency')]
class CurrencyModel
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    public int $copper;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    public int $silver;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    public int $electrum;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    public int $gold;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    public int $platinum;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $equipment;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    public string $treasure;
}