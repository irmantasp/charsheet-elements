<?php

namespace App\ValueResolver;

use App\Entity\Character;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CharacterValueResolver implements ValueResolverInterface
{
    private SessionInterface $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    final public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $argumentType = $argument->getType();
        if ($argumentType !== Character::class) {
            return [];
        }

        $characters = $this->session->get('characters');
        if (empty($characters)) {
            return [];
        }

        $uuid = $request->get('character');
        if (is_null($uuid)) {
            return [];
        }

        if (!isset($characters[$uuid])) {
            return [];
        }

        return [$characters[$uuid]];
    }
}