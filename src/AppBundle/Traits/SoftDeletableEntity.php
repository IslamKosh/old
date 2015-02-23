<?php

namespace AppBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletableMethods;

trait SoftDeletableEntity 
{
    use SoftDeletableMethods;

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt;
}