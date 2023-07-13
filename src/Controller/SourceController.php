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
            if (isset($resolution['official']) && $resolution['official'] === 'true') {
                if (isset($resolution['core']) && $resolution['core'] === 'true') {
                    $sourceType = 'wotc';
                }

                if (isset($resolution['supplement']) && $resolution['supplement'] === 'true') {
                    $sourceType = 'wotc';
                }

                if (isset($resolution['league']) && $resolution['league'] === 'true') {
                    $sourceType = 'league';
                }

                if (isset($resolution['playtest']) && $resolution['playtest'] === 'true' && (!isset($resolution['supplement']) || $resolution['supplement'] === 'false')) {
                    $sourceType = 'unearthed-arcana';
                }
            }

            if (isset($resolution['third-party']) && $resolution['third-party'] === 'true') {
                $sourceType = 'third-party';
            }

            if (isset($resolution['homebrew']) && $resolution['homebrew'] === 'true') {
                $sourceType = 'homebrew';
            }

            if ($sourceType === null) {
                $sourceType = 'undefined';
            }

            $list[$sourceType][$sourceId] = $source;
        }

        return $this->render('source/list.html.twig', ['content' => $list]);
    }

}