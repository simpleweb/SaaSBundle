<?php

namespace Simpleweb\SaaSBundle\EventListener;

use FOS\UserBundle\FOSUserEvents,
    FOS\UserBundle\Event\FilterUserResponseEvent,
    FOS\UserBundle\Event\FormEvent,
    Simpleweb\SaaSBundle\Event\SubscriptionEvent,
    Simpleweb\SaaSBundle\SaaSEvents,
    Simpleweb\SaaSBundle\Manager\SubscriptionManager,
    Symfony\Component\EventDispatcher\EventDispatcherInterface,
    Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface
{
    protected $event_dispatcher;

    protected $subscription_manager;

    public function __construct(EventDispatcherInterface $event_dispatcher, SubscriptionManager $subscription_manager)
    {
        $this->event_dispatcher = $event_dispatcher;
        $this->subscription_manager = $subscription_manager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationCompleted'
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $form = $event->getForm();

        $user = $form->getData();
        $plan = $form->get('plan')->getData();

        $this->subscription_manager->subscribe($user, $plan);
    }

    public function onRegistrationCompleted(FilterUserResponseEvent $event)
    {
        $this->event_dispatcher->dispatch(SaaSEvents::SUBSCRIBED, new SubscriptionEvent($event->getUser(), $event->getUser()->getSubscription()));
    }
}
