<?php

namespace Simpleweb\SaaSBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Validator\Constraints as Assert,
    FOS\UserBundle\Model\Entity\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="features")
 * @Gedmo\Mapping\Annotation\Loggable
 */
class Feature
{
    const FQCN = __CLASS__;

    use Traits\Identifiable,
        Traits\Timestampable,
        Traits\SoftDeleteable;

    /**
     * @Assert\NotBlank
     * @Gedmo\Mapping\Annotation\Versioned
     * @ORM\Column
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="FOS\UserBundle\Model\Entity\UserInterface", mappedBy="features")
     */
    protected $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName() ?: 'Unnamed Feature';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Feature
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param UserInterface $user
     * @return Feature
     */
    public function addUser(UserInterface $user)
    {
        $this->getUsers()->add($user);
        $user->setReport($this);

        return $this;
    }

    /**
     * @param UserInterface $user
     * @return Feature
     */
    public function removeUser(UserInterface $user)
    {
        $this->getUsers()->removeElement($user);

        return $this;
    }
}
