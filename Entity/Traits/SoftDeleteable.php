<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait SoftDeleteable
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_at;

    /**
     * Sets deleted_at.
     *
     * @param \Datetime|null $deleted_at
     *
     * @return $this
     */
    public function setDeletedAt(\DateTime $deleted_at = null)
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    /**
     * Returns deleted_at.
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Is deleted?
     *
     * @return bool
     */
    public function isDeleted()
    {
        return null !== $this->deleted_at;
    }
}
