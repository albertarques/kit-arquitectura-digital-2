<?php

namespace App\Entity;

use App\Repository\TeacherAbsenceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherAbsenceRepository::class)]
class TeacherAbsence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'teacherAbsences')]
    private ?Teacher $teacher = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $day = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): static
    {
        $this->day = $day;

        return $this;
    }
}
