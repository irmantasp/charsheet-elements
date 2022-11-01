<?php

namespace App\Controller;

use App\Controller\Debug\IndexController;
use App\Form\Type\CharacterType;
use App\Model\Index\ElementsModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends IndexController
{

    final public function add(Request $request): Response
    {
        $files = $this->getFiles('index', 'xml');
        $indexes = $this->getContent($files, ElementsModel::class, 'xml');
        [$info, $elements, $appends] = $this->splitData($indexes);
        $types = ['Race', 'Class', 'Feat', 'Background', 'Item', 'Spell', 'Source'];
        [$races, $classes, $feats, $backgrounds, $items, $spells, $sources] = $this->splitByType($types, $elements);
        $data = [
            'race' => $races,
            'class' => $classes,
            'background' => $backgrounds
        ];

        if ($request->isMethod('POST')) {
            $data['request'] = $request;
        }

        $form = $this->createForm(CharacterType::class, $data);

        $form->handleRequest($request);

        return $this->renderForm('character.html.twig', ['form' => $form]);
    }
}