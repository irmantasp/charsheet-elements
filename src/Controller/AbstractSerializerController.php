<?php

namespace App\Controller;

use App\Helper\FileProviderTrait;
use App\Helper\SerializerHelperTrait;
use App\Provider\FileProvider;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class AbstractSerializerController extends AbstractController
{
    use SerializerHelperTrait;
    use FileProviderTrait;

    final public function __construct(SerializerInterface $serializer, FileProvider $fileProvider)
    {
        $this->serializer = $serializer;
        $this->fileProvider = $fileProvider;
    }
}