<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

abstract class AbstractEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $created_at = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(name: 'updated_at', nullable: true,  type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $updated_at = null;

    #[Gedmo\Timestampable(on: 'update', )]
    #[ORM\Column(name: 'removed_at', nullable: true,  type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $removed_at = null;

    #[ORM\Column(name: 'enabled', nullable: false,  type: Types::BOOLEAN)]
    protected ?bool $enabled = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getRemovedAt(): ?\DateTimeInterface
    {
        return $this->removed_at;
    }

    public function setRemovedAt(?\DateTimeInterface $removed_at): static
    {
        $this->removed_at = $removed_at;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

}