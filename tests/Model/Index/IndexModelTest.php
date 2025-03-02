<?php

namespace App\Tests\Model\Index;

use App\Model\Index\Index\Info\AuthorModel;
use App\Model\Index\Index\Info\Update\FileModel;
use App\Model\Index\Index\Info\UpdateModel;
use App\Model\Index\IndexModel;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IndexModelTest extends KernelTestCase
{
    private ?SerializerInterface $serializer = null;

    private ?string $file = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->serializer = $container->get('jms_serializer');
        $this->file = file_get_contents(__DIR__ . '/example.index');
    }

    final public function testIndexModelDeserialize(): void
    {
        $model = $this->serializer->deserialize($this->file, IndexModel::class, 'xml');
        $this->assertInstanceOf(IndexModel::class, $model);

        $info = $model->getInfo();
        $this->assertEquals('Example', $info->getName());
        $this->assertEquals('Example content', $info->getDescription());

        $author = $info->getAuthor();
        $this->assertInstanceOf(AuthorModel::class, $author);
        $this->assertEquals('https://github.com', $author->getUrl());
        $this->assertEquals('Example author', $author->getValue());

        $update = $info->getUpdate();
        $this->assertInstanceOf(UpdateModel::class, $update);
        $this->assertEquals('0.0.1', $update->getVersion());

        $files = $update->getFiles();
        $this->assertIsArray($files);
        $this->assertCount(1, $files);

        foreach ($files as $file) {
            $this->assertInstanceOf(FileModel::class, $file);
            $this->assertIsString($file->getName());
            $this->assertIsString($file->getUrl());
        }

    }

    final public function testIndexModelSerialize(): void {
        $model = $this->serializer->deserialize($this->file, IndexModel::class, 'xml');
        $content = $this->serializer->serialize($model, 'xml');

        $this->assertXmlStringEqualsXmlString($this->file, $content);
    }
}