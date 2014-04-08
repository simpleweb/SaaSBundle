<?php

namespace Simpleweb\SaaSBundle\Manager;

use FOS\UserBundle\Model\UserInterface,
    Simpleweb\SaaSBundle\Entity\PlanInterface;

class SubscriptionManager
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function subscribe(UserInterface $user, PlanInterface $plan)
    {
        $subscription = new $this->class;

        $subscription
            ->setName($plan->getName())
            ->setPrice($plan->getPrice())
            ->setDiscount($plan->getDiscount())
            ->setPlan($plan)
        ;

        $user->addSubscription($subscription);

        return $subscription;
    }
}
