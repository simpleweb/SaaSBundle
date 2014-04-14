<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Referrer
{
    /**
     * @ORM\OneToMany(targetEntity = "FOS\UserBundle\Model\UserInterface", mappedBy = "referrer")
     * @ORM\OrderBy({"created_at" = "DESC"})
     */
    protected $referrals;

    /**
     * @ORM\ManyToOne(targetEntity="FOS\UserBundle\Model\UserInterface", inversedBy="referrals")
     */
    protected $referrer;

    /**
     * @return FOS\UserBundle\Model\UserInterface
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param FOS\UserBundle\Model\UserInterface
     */
    public function setReferrer(\FOS\UserBundle\Model\UserInterface $referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getReferrals()
    {
        return $this->referrals;
    }

    /**
     * @param FOS\UserBundle\Model\UserInterface $referral
     * @return FOS\UserBundle\Model\UserInterface
     */
    public function addReferral(\FOS\UserBundle\Model\UserInterface $referral)
    {
        $this->getReferrals()->add($referral);
        $referral->setReferrer($this);

        return $this;
    }

    /**
     * @param FOS\UserBundle\Model\UserInterface $referral
     * @return FOS\UserBundle\Model\UserInterface
     */
    public function removeReferral(\FOS\UserBundle\Model\UserInterface $referral)
    {
        $this->getReferrals()->removeElement($referral);

        return $this;
    }
}
