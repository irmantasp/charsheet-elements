<?php

namespace App\ParamConverter;

use App\Entity\Character;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CharacterParamConverter implements ParamConverterInterface
{
    private SessionInterface $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    final public function apply(Request $request, ParamConverter $configuration): bool
    {
        $characters = $this->session->get('characters');
        if (empty($characters)) {
            throw new NotFoundHttpException('There are no characters.');
        }

        $uuid = $request->get('character');
        if (is_null($uuid)) {
            throw new BadRequestException('Missing character ID.');
        }

        if (!isset($characters[$uuid])) {
            throw new NotFoundHttpException('There is no character with that ID.');
        }

         $request->attributes->set($configuration->getName(), $characters[$uuid]);

        return true;
    }

    final public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getName() === 'character' && $configuration->getClass() === Character::class;
    }
}