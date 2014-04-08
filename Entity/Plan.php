<?php

namespace Simpleweb\SaaSBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass
 */
abstract class Plan implements PlanInterface
{
    const FQCN = __CLASS__;

    use Traits\Plan;

    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="plan")
     * @ORM\OrderBy({"created_at" = "DESC"})
     */
    protected $subscriptions;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName() ?: 'Unnamed Plan';
    }

    /**
     * @return Subscription
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
     * @param Subscription $subscription
     * @return Feature
     */
    public function addSubscription(Subscription $subscription)
    {
        $this->getSubscriptions()->add($subscription);
        $subscription->setReport($this);

        return $this;
    }

    /**
     * @param Subscription $subscription
     * @return Feature
     */
    public function removeSubscription(Subscription $subscription)
    {
        $this->getSubscriptions()->removeElement($subscription);

        return $this;
    }
}
