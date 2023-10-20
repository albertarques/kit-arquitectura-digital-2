<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event extends AbstractEntity
{

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $begin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end = null;

    #[ORM\Column]
    private ?int $classroom = null;

    #[ORM\Column(nullable: true)]
    private ?int $day_frequency_repeat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $until = null;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'events')]
    private Collection $event_student;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?ClassGroup $group = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?Teacher $teacher = null;

    public function __construct()
    {
        $this->event_student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->begin;
    }

    public function setBegin(\DateTimeInterface $begin): static
    {
        $this->begin = $begin;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): static
    {
        $this->end = $end;

        return $this;
    }

    public function getClassroom(): ?int
    {
        return $this->classroom;
    }

    public function setClassroom(int $classroom): static
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getDayFrequencyRepeat(): ?int
    {
        return $this->day_frequency_repeat;
    }

    public function setDayFrequencyRepeat(?int $day_frequency_repeat): static
    {
        $this->day_frequency_repeat = $day_frequency_repeat;

        return $this;
    }

    public function getUntil(): ?\DateTimeInterface
    {
        return $this->until;
    }

    public function setUntil(?\DateTimeInterface $until): static
    {
        $this->until = $until;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getEventStudent(): Collection
    {
        return $this->event_student;
    }

    public function addEventStudent(Student $eventStudent): static
    {
        if (!$this->event_student->contains($eventStudent)) {
            $this->event_student->add($eventStudent);
        }

        return $this;
    }

    public function removeEventStudent(Student $eventStudent): static
    {
        $this->event_student->removeElement($eventStudent);

        return $this;
    }

    public function getGroupId(): ?ClassGroup
    {
        return $this->group;
    }

    public function setGroupId(?ClassGroup $group): static
    {
        $this->group = $group;

        return $this;
    }

    public function getTeacherId(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacherId(?Teacher $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }
}
