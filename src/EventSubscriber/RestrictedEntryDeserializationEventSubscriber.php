<?php

namespace App\EventSubscriber;

use App\Model\RestrictedEntry;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class RestrictedEntryDeserializationEventSubscriber implements EventSubscriberInterface
{
    public const ENTRY_TYPE_SOURCE = 'source';

    public const ENTRY_TYPE_ELEMENT = 'element';

    public array $mapping = [
        self::ENTRY_TYPE_SOURCE => RestrictedEntry\Source::class,
        self::ENTRY_TYPE_ELEMENT => RestrictedEntry\Element::class,
    ];

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [
            [
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'class' => RestrictedEntry::class,
                'format' => 'xml',
            ],
        ];
    }

    final public function onPreDeserialize(PreDeserializeEvent $event): void
    {
        $data = $event->getData();
        if ($data instanceof \SimpleXMLElement) {
            $name = $data->getName();
            if (isset($this->mapping[$name])) {
                $type = $event->getType();
                $type['name'] = $this->mapping[$name];
                $event->setType($type['name'], $type['params']);
            }
        }
    }
}