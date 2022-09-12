<?php

namespace App\EventSubscriber;

use App\Model\Index\Elements\Element\Rules\GrantModel;
use App\Model\Index\Elements\Element\Rules\RuleModel;
use App\Model\Index\Elements\Element\Rules\SelectModel;
use App\Model\Index\Elements\Element\Rules\StatisticsModel;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class RuleDeserializationEventSubscriber implements EventSubscriberInterface
{

    public const RULE_TYPE_GRANT = 'grant';

    public const RULE_TYPE_SELECT = 'select';

    PUBLIC const RULE_TYPE_STAT = 'stat';

    public array $mapping = [
        self::RULE_TYPE_GRANT => GrantModel::class,
        self::RULE_TYPE_SELECT => SelectModel::class,
        self::RULE_TYPE_STAT => StatisticsModel::class,
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
                'class' => RuleModel::class,
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