<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice extends AbstractEntity
{


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_payed = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $payment_date = null;

    #[ORM\Column(nullable: true)]
    private ?float $base_amount = null;

    #[ORM\Column]
    private ?float $tax_percentage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $discount_applied = null;

    #[ORM\Column(nullable: true)]
    private ?float $total_amount = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $month = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $year = null;

    #[ORM\Column(nullable: true)]
    private ?float $irpf_percentage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_sended = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $send_date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_for_private_lessons = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_sepa_xml_generated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sepa_xmnl_generated_date = null;

    #[ORM\ManyToOne(inversedBy: 'invoices')]
    private ?Receipt $receipt = null;

    #[ORM\ManyToOne(inversedBy: 'invoices')]
    private ?Person $person = null;

    #[ORM\ManyToOne(inversedBy: 'invoices')]
    private ?Student $student = null;

    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: InvoiceLine::class)]
    private Collection $invoiceLines;

    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, InvoiceLine>
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function isIsPayed(): ?bool
    {
        return $this->is_payed;
    }

    public function setIsPayed(?bool $is_payed): static
    {
        $this->is_payed = $is_payed;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->payment_date;
    }

    public function setPaymentDate(?\DateTimeInterface $payment_date): static
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getBaseAmount(): ?float
    {
        return $this->base_amount;
    }

    public function setBaseAmount(?float $base_amount): static
    {
        $this->base_amount = $base_amount;

        return $this;
    }

    public function getTaxPercentage(): ?float
    {
        return $this->tax_percentage;
    }

    public function setTaxPercentage(float $tax_percentage): static
    {
        $this->tax_percentage = $tax_percentage;

        return $this;
    }

    public function isDiscountApplied(): ?bool
    {
        return $this->discount_applied;
    }

    public function setDiscountApplied(?bool $discount_applied): static
    {
        $this->discount_applied = $discount_applied;

        return $this;
    }

    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    public function setTotalAmount(?float $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): static
    {
        $this->month = $month;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getIrpfPercentage(): ?float
    {
        return $this->irpf_percentage;
    }

    public function setIrpfPercentage(?float $irpf_percentage): static
    {
        $this->irpf_percentage = $irpf_percentage;

        return $this;
    }

    public function isIsSended(): ?bool
    {
        return $this->is_sended;
    }

    public function setIsSended(?bool $is_sended): static
    {
        $this->is_sended = $is_sended;

        return $this;
    }

    public function getSendDate(): ?\DateTimeInterface
    {
        return $this->send_date;
    }

    public function setSendDate(?\DateTimeInterface $send_date): static
    {
        $this->send_date = $send_date;

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

    public function isIsSepaXmlGenerated(): ?bool
    {
        return $this->is_sepa_xml_generated;
    }

    public function setIsSepaXmlGenerated(?bool $is_sepa_xml_generated): static
    {
        $this->is_sepa_xml_generated = $is_sepa_xml_generated;

        return $this;
    }

    public function getSepaXmnlGeneratedDate(): ?\DateTimeInterface
    {
        return $this->sepa_xmnl_generated_date;
    }

    public function setSepaXmnlGeneratedDate(?\DateTimeInterface $sepa_xmnl_generated_date): static
    {
        $this->sepa_xmnl_generated_date = $sepa_xmnl_generated_date;

        return $this;
    }

    public function getReceipt(): ?Receipt
    {
        return $this->receipt;
    }

    public function setReceipt(?Receipt $receipt): static
    {
        $this->receipt = $receipt;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

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
            $invoiceLine->setInvoice($this);
        }

        return $this;
    }

    public function removeInvoiceLine(InvoiceLine $invoiceLine): static
    {
        if ($this->invoiceLines->removeElement($invoiceLine)) {
            // set the owning side to null (unless already changed)
            if ($invoiceLine->getInvoice() === $this) {
                $invoiceLine->setInvoice(null);
            }
        }

        return $this;
    }
}
