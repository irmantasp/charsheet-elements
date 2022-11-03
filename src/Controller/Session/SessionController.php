<?php

namespace App\Controller\Session;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    private function session(): SessionInterface
    {
        return $this->requestStack->getSession();
    }

    #[Route('/session/reset', name: 'session.reset')]
    final public function reset(): Response
    {
        $this->session()->invalidate();

        return $this->redirectToRoute('character.list');
    }
}