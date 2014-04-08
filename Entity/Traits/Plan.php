<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Plan
{
    use Identifiable,
        Timestampable,
        SoftDeleteable;

    /**
     * @Assert\NotBlank
     * @ORM\Column(nullable = false, length = 100)
     */
    protected $name;

    /**
     * @ORM\Column(type = "text", nullable = true)
     */
    protected $description;

    /**
     * @ORM\Column(type = "decimal", scale = 2, nullable = true)
     */
    protected $price;

    /**
     * @ORM\Column(type = "decimal", scale = 2, nullable = true)
     */
    protected $discount;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PlanInterface
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return PlanInterface
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return PlanInterface
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }
}
