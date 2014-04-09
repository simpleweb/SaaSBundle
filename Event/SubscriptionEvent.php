<?php

namespace Simpleweb\SaaSBundle\Event;

use FOS\UserBundle\Model\UserInterface,
    Simpleweb\SaaSBundle\Entity\SubscriptionInterface,
    Symfony\Component\EventDispatcher\Event;

class SubscriptionEvent extends Event
{
    protected $subscription;

    protected $user;

    public function __construct(UserInterface $user, SubscriptionInterface $subscription)
    {
        $this->user = $user;
        $this->subscription = $subscription;
    }

    /**
     * @return SubscriptionInterface
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
