<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Traits\BlameableEntity;
use AppBundle\Traits\TimestampableEntity;
use AppBundle\Traits\SoftDeletableEntity;

/**
 * Job
 *
 * @ORM\Table(name="jobs")
 * @ORM\Entity()
 */
class Job
{
    use SoftDeletableEntity,
        TimestampableEntity,
        BlameableEntity;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="instructions", type="text", nullable=true)
     */
    protected $instructions;

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
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="jobs")
     */
    protected $book;

    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     **/
    protected $assigned;

    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     **/
    protected $owner;

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
     * Set title
     *
     * @param string $title
     *
     * @return Node
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $description
     *
     * @return Node
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
}