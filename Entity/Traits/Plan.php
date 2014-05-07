<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Plan
{
    use Identifiable,
        Timestampable,
        SoftDeleteable;

    /**
     * @Assert\NotBlank
     * @ORM\Column(length = 100)
     */
    protected $name;

    /**
     * @ORM\Column(type = "text", nullable = true)
     */
    protected $description;

    /**
     * @ORM\Column(type = "decimal", scale = 2)
     */
    protected $price = 0;

    /**
     * @ORM\Column(type = "decimal", scale = 2)
     */
    protected $discount = 0;

    /**
     * @var Currency $currency
     *
     * @ORM\ManyToOne(targetEntity="Lexik\Bundle\CurrencyBundle\Entity\Currency", fetch="EAGER")
     */
    protected $currency;

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
     * @return float
     */
    public function getPriceInCents()
    {
        return $this->getPrice() * 100;
    }

    /**
     * @return float
     */
    public function getDiscountedPrice()
    {
        return $this->getPrice() * (1 - $this->getDiscount());
    }
    /**
     * @return float
     */
    public function getDiscountedPriceInCents()
    {
        return $this->getDiscountedPrice() * 100;
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

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PlanInterface
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }
}
