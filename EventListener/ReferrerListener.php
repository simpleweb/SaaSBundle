<?php

namespace Simpleweb\SaaSBundle\EventListener;

use JMS\DiExtraBundle\Annotation as DI,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\HttpKernel\Event\GetResponseEvent,
    Symfony\Component\HttpKernel\HttpKernel,
    Symfony\Component\HttpKernel\KernelEvents;

class ReferrerListener implements EventSubscriberInterface
{
    public function __construct($session)
    {
        $this->session = $session;
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => 'onKernelRequest'
        );
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (HttpKernel::MASTER_REQUEST === $event->getRequestType()) {
            $request = $event->getRequest();

            if ($request->get('referrer')) {
                $this->session->set('referrer', $request->get('referrer'));
            }
        }
    }
}
