<?php

namespace App\Entity;

use App\Repository\ClassGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassGroupRepository::class)]
class ClassGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $book = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_for_private_lessons = null;

    #[ORM\OneToMany(mappedBy: 'group', targetEntity: Event::class)]
    private Collection $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBook(): ?string
    {
        return $this->book;
    }

    public function setBook(?string $book): static
    {
        $this->book = $book;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function isIsForPrivateLessons(): ?bool
    {
        return $this->is_for_private_lessons;
    }

    public function setIsForPrivateLessons(?bool $is_for_private_lessons): static
    {
        $this->is_for_private_lessons = $is_for_private_lessons;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setGroupId($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getGroupId() === $this) {
                $event->setGroupId(null);
            }
        }

        return $this;
    }

}
