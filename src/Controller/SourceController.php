<?php

namespace App\Controller;

use App\Model\Source\IndexModel;
use App\Provider\FileProvider;
use App\Transformer\IndexModelToListItemTransformer;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractSerializerController
{

    private IndexModelToListItemTransformer $listItemTransformer;

    final public function __construct(
        SerializerInterface $serializer,
        FileProvider $fileProvider,
        IndexModelToListItemTransformer $listItemTransformer
    )
    {
        parent::__construct($serializer, $fileProvider);

        $this->listItemTransformer = $listItemTransformer;
    }

    /**
     * @Route("/sources", name="source_list")
     */
    final public function list(): Response
    {
        $files = $this->getFiles('index', 'index');
        /** @var IndexModel[] $sources */
        $sources = $this->getContent($files, IndexModel::class, 'xml');
        $sources = $this->listItemTransformer->transformMultiple($sources);

        return $this->render('source_list.html.twig', ['sources' => $sources]);
    }
}