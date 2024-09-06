<?php

namespace App\Controller;

use App\Model\Elements\Elements\Element\Setters\SetterModel;
use App\Model\Elements\Elements\ElementModel;
use App\Provider\ContentElementsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    private ContentElementsProvider $contentElementsProvider;

    public function __construct(ContentElementsProvider $contentElementsProvider)
    {
        $this->contentElementsProvider = $contentElementsProvider;
    }

    #[Route('/sources')]
    final public function list(): Response
    {
        $sources = $this->contentElementsProvider->getElementsByType('Source');

        $list = [];
        foreach ($sources as $sourceId => $source) {
            $resolution = [];
            /** @var ElementModel $source */
            if (!empty($source->setters->setters)) {
                $setters = $source->setters->setters;
                foreach ($setters as $setter) {
                    /** @var SetterModel $setter */
                    $type = $setter->name;
                    $resolution[$type] = $setter->value;
                }
            }

            $sourceType = null;
            if (isset($resolution['official']) && 'true' === $resolution['official']) {
                if (isset($resolution['core']) && 'true' === $resolution['core']) {
                    $sourceType = 'wotc';
                }

                if (isset($resolution['supplement']) && 'true' === $resolution['supplement']) {
                    $sourceType = 'wotc';
                }

                if (isset($resolution['league']) && 'true' === $resolution['league']) {
                    $sourceType = 'league';
                }

                if (isset($resolution['playtest']) && 'true' === $resolution['playtest'] && (!isset($resolution['supplement']) || 'false' === $resolution['supplement'])) {
                    $sourceType = 'unearthed-arcana';
                }
            }

            if (isset($resolution['third-party']) && 'true' === $resolution['third-party']) {
                $sourceType = 'third-party';
            }

            if (isset($resolution['homebrew']) && 'true' === $resolution['homebrew']) {
                $sourceType = 'homebrew';
            }

            if (null === $sourceType) {
                $sourceType = 'undefined';
            }

            $list[$sourceType][$sourceId] = $source;
        }

        return $this->render('source/list.html.twig', ['content' => $list]);
    }
}
