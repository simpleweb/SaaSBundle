<?php

namespace Simpleweb\SaaSBundle\Event;

use Simpleweb\SaaSBundle\Entity\SubscriptionInterface,
    Symfony\Component\EventDispatcher\Event;

class SubscriptionEvent extends Event
{
    protected $subscription;

    public function __construct(SubscriptionInterface $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return SubscriptionInterface
     */
    public function getSubscription()
    {
        return $this->subscription;
    }
}
