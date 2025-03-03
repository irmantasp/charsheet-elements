<?php

namespace App\Handler;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;

class HtmlHandler implements SubscribingHandlerInterface
{
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

    final public function serializeHTML(SerializationVisitorInterface $visitor, ?string $data, array $type, SerializationContext $context): ?\DOMElement
    {
        return new \DOMElement('description', $data);
    }

    final public function deserializeHTML(DeserializationVisitorInterface $visitor, \SimpleXMLElement $element, array $type, DeserializationContext $context): ?string
    {
        $content = $element->children();
        if (!$content instanceof \SimpleXMLElement) {
            return null;
        }

        $html = [];
        foreach ($content as $line) {
            $html[] = $line->asXML();
        }

        return implode('', $html);
    }
}
