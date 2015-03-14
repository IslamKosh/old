<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Traits\BlameableEntity;
use AppBundle\Traits\TimestampableEntity;
use AppBundle\Traits\SoftDeletableEntity;

/**
 * Book
 *
 * @ORM\Table(name="books")
 * @ORM\Entity()
 */
class Book
{
    use TimestampableEntity,
        SoftDeletableEntity,
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
     * @var array
     *
     * @ORM\Column(name="meta", type="json", nullable=true)
     */
    protected $meta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    protected $published;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Job", mappedBy="book")
     */
    protected $jobs;

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
     * Set description
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
     * Get description
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
     * Get published status
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set published status
     *
     * @param boolean $published
     *
     * @return Node
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }
}