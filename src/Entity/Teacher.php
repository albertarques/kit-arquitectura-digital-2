<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?int $color = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_name = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column]
    private ?bool $show_in_homepage = null;

    #[ORM\OneToMany(mappedBy: 'teacher_id', targetEntity: TeacherAbsence::class)]
    private Collection $teacherAbsences;

    public function __construct()
    {
        $this->teacherAbsences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getColor(): ?int
    {
        return $this->color;
    }

    public function setColor(int $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(?string $image_name): static
    {
        $this->image_name = $image_name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isShowInHomepage(): ?bool
    {
        return $this->show_in_homepage;
    }

    public function setShowInHomepage(bool $show_in_homepage): static
    {
        $this->show_in_homepage = $show_in_homepage;

        return $this;
    }

    /**
     * @return Collection<int, TeacherAbsence>
     */
    public function getTeacherAbsences(): Collection
    {
        return $this->teacherAbsences;
    }

    public function addTeacherAbsence(TeacherAbsence $teacherAbsence): static
    {
        if (!$this->teacherAbsences->contains($teacherAbsence)) {
            $this->teacherAbsences->add($teacherAbsence);
            $teacherAbsence->setTeacherId($this);
        }

        return $this;
    }

    public function removeTeacherAbsence(TeacherAbsence $teacherAbsence): static
    {
        if ($this->teacherAbsences->removeElement($teacherAbsence)) {
            // set the owning side to null (unless already changed)
            if ($teacherAbsence->getTeacherId() === $this) {
                $teacherAbsence->setTeacherId(null);
            }
        }

        return $this;
    }
}
