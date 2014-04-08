<?php

namespace Simpleweb\SaaSBundle\Entity;

interface PlanInterface
{
    public function __toString();

    public function getName();

    public function setName($name);

    public function getPrice();

    public function setPrice($price);

    public function getDiscount();

    public function setDiscount($discount);
}
