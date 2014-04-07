<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Subscriber
{
    /**
     * @ORM\ManyToMany(targetEntity="Simpleweb\SaaSBundle\Entity\Feature", inversedBy="users")
     */
    protected $features;

    public function getFeatures()
    {
        return $this->features;
    }

    public function addFeature(Feature $feature)
    {
        $this->getFeatures()->add($feature);
        $feature->setFeature($this);

        return $this;
    }

    public function removeFeature(Feature $feature)
    {
        $this->getFeatures()->removeElement($feature);

        return $this;
    }
}
