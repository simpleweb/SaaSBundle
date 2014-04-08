<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Subscriber
{
    /**
     * @ORM\OneToMany(targetEntity="Simpleweb\SaaSBundle\Entity\SubscriptionInterface", mappedBy="user")
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
     * @return FOS\UserBundle\Model\Entity\UserInterface
     */
    public function addSubscription(SubscriptionInterface $subscription)
    {
        $this->getSubscriptions()->add($subscription);
        $subscription->setReport($this);

        return $this;
    }
}
