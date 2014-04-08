<?php

namespace Simpleweb\SaaSBundle\Entity;

use FOS\UserBundle\Model\UserInterface;

interface SubscriptionInterface
{
    public function __toString();

    public function getPlan();

    public function setPlan(PlanInterface $plan);

    public function getUser();

    public function setUser(UserInterface $user);
}
