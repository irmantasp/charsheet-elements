<?php

namespace App\Handler;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\SkipHandlerException;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;

class HtmlHandler implements SubscribingHandlerInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'HTML',
                'method' => 'serializeHTML',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'HTML',
                'method' => 'deserializeHTML',
            ],
        ];
    }

    final public function serializeHTML(SerializationVisitorInterface $visitor, string $data, array $type, SerializationContext $context): \SimpleXMLElement
    {
        $a = 1;
    }

    final public function deserializeHTML(DeserializationVisitorInterface $visitor, \SimpleXMLElement $element, array $type, DeserializationContext $context): ?string
    {
        $content = $element->children();
        if (!$content instanceof \SimpleXMLElement) {
            return null;
        }

        return $content->asXML();
    }
}