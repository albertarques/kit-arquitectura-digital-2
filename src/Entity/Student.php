<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $payment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $schedule = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comments = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birth_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $parent_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dni = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(nullable: true)]
    private ?bool $has_image_rights_accepted = null;

    #[ORM\Column(nullable: true)]
    private ?bool $has_sepa_agreement_accepted = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Tariff $tariff = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Bank $bank_id = null;

    #[ORM\ManyToMany(targetEntity: Event::class, mappedBy: 'event_student')]
    private Collection $events;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city_id = null;

    #[ORM\OneToMany(mappedBy: 'student_id', targetEntity: InvoiceLine::class)]
    private Collection $invoiceLines;

    #[ORM\OneToMany(mappedBy: 'student_id', targetEntity: Receipt::class)]
    private Collection $receipts;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->invoiceLines = new ArrayCollection();
        $this->receipts = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPayment(): ?int
    {
        return $this->payment;
    }

    public function setPayment(int $payment): static
    {
        $this->payment = $payment;

        return $this;
    }

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(?string $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): static
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(?int $parent_id): static
    {
        $this->parent_id = $parent_id;

        return $this;
    }
    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(?string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function isHasImageRightsAccepted(): ?bool
    {
        return $this->has_image_rights_accepted;
    }

    public function setHasImageRightsAccepted(?bool $has_image_rights_accepted): static
    {
        $this->has_image_rights_accepted = $has_image_rights_accepted;

        return $this;
    }

    public function isHasSepaAgreementAccepted(): ?bool
    {
        return $this->has_sepa_agreement_accepted;
    }

    public function setHasSepaAgreementAccepted(?bool $has_sepa_agreement_accepted): static
    {
        $this->has_sepa_agreement_accepted = $has_sepa_agreement_accepted;

        return $this;
    }

    public function getTariff(): ?Tariff
    {
        return $this->tariff;
    }

    public function setTariff(?Tariff $tariff): static
    {
        $this->tariff = $tariff;

        return $this;
    }

    public function getBankId(): ?Bank
    {
        return $this->bank_id;
    }

    public function setBankId(?Bank $bank_id): static
    {
        $this->bank_id = $bank_id;

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
            $event->addEventStudent($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            $event->removeEventStudent($this);
        }

        return $this;
    }

    public function getCityId(): ?City
    {
        return $this->city_id;
    }

    public function setCityId(?City $city_id): static
    {
        $this->city_id = $city_id;

        return $this;
    }

    /**
     * @return Collection<int, InvoiceLine>
     */
    public function getInvoiceLines(): Collection
    {
        return $this->invoiceLines;
    }

    public function addInvoiceLine(InvoiceLine $invoiceLine): static
    {
        if (!$this->invoiceLines->contains($invoiceLine)) {
            $this->invoiceLines->add($invoiceLine);
            $invoiceLine->setStudentId($this);
        }

        return $this;
    }

    public function removeInvoiceLine(InvoiceLine $invoiceLine): static
    {
        if ($this->invoiceLines->removeElement($invoiceLine)) {
            // set the owning side to null (unless already changed)
            if ($invoiceLine->getStudentId() === $this) {
                $invoiceLine->setStudentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Receipt>
     */
    public function getReceipts(): Collection
    {
        return $this->receipts;
    }

    public function addReceipt(Receipt $receipt): static
    {
        if (!$this->receipts->contains($receipt)) {
            $this->receipts->add($receipt);
            $receipt->setStudentId($this);
        }

        return $this;
    }

    public function removeReceipt(Receipt $receipt): static
    {
        if ($this->receipts->removeElement($receipt)) {
            // set the owning side to null (unless already changed)
            if ($receipt->getStudentId() === $this) {
                $receipt->setStudentId(null);
            }
        }

        return $this;
    }
}
