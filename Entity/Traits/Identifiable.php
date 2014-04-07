<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Identifiable
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    protected $id;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
