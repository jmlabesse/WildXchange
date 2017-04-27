<?php

namespace XTeam\PlatformBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class AuthenticationListener implements EventSubscriberInterface
{

    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
        );
    }

    public function onAuthenticationFailure(AuthenticationFailureEvent $event )
    {
        $url = $this->router->generate('xteam_platform_dashboard');

        $event->setResponse(new RedirectResponse($url));
    }


}