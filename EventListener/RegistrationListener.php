<?php

namespace Simpleweb\SaaSBundle\EventListener;

use FOS\UserBundle\FOSUserEvents,
    FOS\UserBundle\Event\FormEvent,
    Simpleweb\SaaSBundle\Manager\SubscriptionManager,
    Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface
{
    protected $subscription_manager;

    public function __construct(SubscriptionManager $subscription_manager)
    {
        $this->subscription_manager = $subscription_manager;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $form = $event->getForm();

        $user = $form->getData();
        $plan = $form->get('plan')->getData();

        $this->subscription_manager->subscribe($user, $plan);
    }
}
