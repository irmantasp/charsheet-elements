<?php

namespace App\Helper;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;

trait SerializerHelperTrait
{
    final public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null): string
    {
        return $this->serializer->serialize($data, $format, $context, $type);
    }

    final public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
