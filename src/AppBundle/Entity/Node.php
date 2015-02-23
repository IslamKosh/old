<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use AppBundle\Traits\BlameableEntity;
use AppBundle\Traits\TimestampableEntity;
use AppBundle\Traits\SoftDeletableEntity;

/**
 * Post
 *
 * @ORM\Table(name="nodes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NodeRepository")
 */
class Node
{
    use TimestampableEntity,
        SoftDeletableEntity,
        BlameableEntity,
        ORMBehaviors\Translatable\Translatable;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=25)
     */
    protected $status;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    protected $type;

    /**
     * @var array
     *
     * @ORM\Column(name="meta", type="json", nullable=true)
     */
    protected $meta;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set meta
     *
     * @param array $meta
     *
     * @return Node
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Get meta
     *
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Node
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Node
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Proxy translated field calls
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }
}
