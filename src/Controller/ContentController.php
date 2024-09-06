<?php

namespace App\Controller;

use App\Entity\Content;
use App\Form\ContentType;
use App\Provider\ContentDirectoryProvider;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController extends AbstractController
{
    private ContentRepository $repository;
    private ContentDirectoryProvider $contentDirectory;

    public function __construct(ContentRepository $contentRepository, ContentDirectoryProvider $contentDirectory)
    {
        $this->repository = $contentRepository;
        $this->contentDirectory = $contentDirectory;
    }

    #[Route('/content')]
    final public function list(): Response
    {
        $content = $this->repository->findAll();
        $content = array_map(function (Content $content) {
            $index = $this->contentDirectory->get($content->getPath());
            $content->__index = $index;

            return $content;
        }, $content);

        return $this->render('content/list.html.twig', ['content' => $content]);
    }

    #[Route('/content/add')]
    final public function add(Request $request): Response
    {
        $content = new Content();
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $content = $form->getData();
            $path = $this->contentDirectory->persist($content->getUrl());
            $content->setPath($path);
            $this->repository->save($content, true);

            if ($content->getId()) {
                return $this->redirectToRoute('app_content_list');
            }
        }

        return $this->render('content/form/add.html.twig', ['form' => $form]);
    }

    #[Route('/content/{content}/delete')]
    final public function delete(Content $content): Response
    {
        $this->contentDirectory->purge($content->getPath());
        $this->repository->remove($content, true);

        return $this->redirectToRoute('app_content_list');
    }
}
