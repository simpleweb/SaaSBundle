<?php

namespace Simpleweb\SaaSBundle\Entity\Traits;

trait Timestampable
{
    /**
     * @Gedmo\Mapping\Annotation\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @Gedmo\Mapping\Annotation\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * Sets created_at.
     *
     * @param  DateTime $created_at
     * @return $this
     */
    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Returns created_at.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Sets updated_at.
     *
     * @param  DateTime $updated_at
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Returns updated_at.
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
