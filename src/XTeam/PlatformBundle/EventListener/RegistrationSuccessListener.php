<?php

namespace XTeam\PlatformBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Listener responsible to change the redirection at the end of the password resetting
 */
class RegistrationSuccessListener implements EventSubscriberInterface
{
    private $router;
    private $session;

    public function __construct(UrlGeneratorInterface $router, Session $session)
    {
        $this->router = $router;
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $url = $this->router->generate('xteam_platform_dashboard');

        $event->setResponse(new RedirectResponse($url));
    }
}