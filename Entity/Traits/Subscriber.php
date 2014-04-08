<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Subscriber
{
    /**
     * @ORM\OneToMany(targetEntity = "Simpleweb\SaaSBundle\Entity\SubscriptionInterface", mappedBy = "user", cascade = {"persist"})
     * @ORM\OrderBy({"created_at" = "DESC"})
     */
    protected $subscriptions;

    /**
     * @return SubscriptionInterface
     */
    public function getSubscription()
    {
        return $this->getSubscriptions()->last();
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param SubscriptionInterface $subscription
     * @return FOS\UserBundle\Model\UserInterface
     */
    public function addSubscription(\Simpleweb\SaaSBundle\Entity\SubscriptionInterface $subscription)
    {
        $this->getSubscriptions()->add($subscription);
        $subscription->setUser($this);

        return $this;
    }
}
