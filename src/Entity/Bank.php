<?php

namespace App\Entity;

use App\Repository\BankRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BankRepository::class)]
class Bank
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $account_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $swift_code = null;

    #[ORM\OneToMany(mappedBy: 'bank', targetEntity: Student::class)]
    private Collection $students;

    #[ORM\OneToMany(mappedBy: 'bank', targetEntity: Person::class)]
    private Collection $person;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->person = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    public function setAccountNumber(?string $account_number): static
    {
        $this->account_number = $account_number;

        return $this;
    }

    public function getSwiftCode(): ?string
    {
        return $this->swift_code;
    }

    public function setSwiftCode(?string $swift_code): static
    {
        $this->swift_code = $swift_code;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->setBankId($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): static
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getBankId() === $this) {
                $student->setBankId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Person>
     */
    public function getPerson(): Collection
    {
        return $this->person;
    }

    public function addPerson(Person $person): static
    {
        if (!$this->person->contains($person)) {
            $this->person->add($person);
            $person->setBankId($this);
        }

        return $this;
    }

    public function removePerson(Person $person): static
    {
        if ($this->person->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getBankId() === $this) {
                $person->setBankId(null);
            }
        }

        return $this;
    }
}
