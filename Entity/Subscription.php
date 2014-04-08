<?php

namespace Simpleweb\SaaSBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM,
    FOS\UserBundle\Model\Entity\UserInterface,
    Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass
 */
abstract class Subscription implements SubscriptionInterface
{
    const FQCN = __CLASS__;

    use Traits\Plan;

    /**
     * @ORM\ManyToOne(targetEntity="Plan", inversedBy="subscriptions")
     */
    protected $plan;

    /**
     * @ORM\ManyToOne(targetEntity="FOS\UserBundle\Model\Entity\UserInterface", inversedBy="subscriptions")
     * @ORM\JoinColumn(nullable = false)
     */
    protected $user;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName() ?: 'Unnamed Subscription';
    }

    /**
     * @return PlanInterface
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param PlanInterface
     * @return Subscription
     */
    public function setPlan(PlanInterface $plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return FOS\UserBundle\Model\Entity\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param FOS\UserBundle\Model\Entity\UserInterface
     * @return Subscription
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
