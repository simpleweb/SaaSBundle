<?php

namespace Simpleweb\SaaSBundle\Manager;

use FOS\UserBundle\Model\UserInterface,
    Simpleweb\SaaSBundle\Entity\PlanInterface,
    Simpleweb\SaaSBundle\Event\SubscriptionEvent,
    Simpleweb\SaaSBundle\SaaSEvents,
    Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SubscriptionManager
{
    protected $class;

    protected $event_dispatcher;

    public function __construct($class, EventDispatcherInterface $event_dispatcher)
    {
        $this->class = $class;
        $this->event_dispatcher = $event_dispatcher;
    }

    public function subscribe(UserInterface $user, PlanInterface $plan)
    {
        $subscription = new $this->class;

        $subscription
            ->setName($plan->getName())
            ->setCurrency($plan->getCurrency())
            ->setPrice($plan->getPrice())
            ->setDiscount($plan->getDiscount())
            ->setPlan($plan)
        ;

        $user->addSubscription($subscription);

        $this->event_dispatcher->dispatch(SaaSEvents::SUBSCRIBED, new SubscriptionEvent($subscription));

        return $subscription;
    }
}
