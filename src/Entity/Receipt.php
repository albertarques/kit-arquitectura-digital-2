<?php

namespace App\Entity;

use App\Repository\ReceiptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceiptRepository::class)]
class Receipt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'receipts')]
    private ?Student $student_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_payed = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $payment_date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_sended = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $send_date = null;

    #[ORM\Column(nullable: true)]
    private ?float $base_amount = null;

    #[ORM\Column(nullable: true)]
    private ?bool $discount_applied = null;

    #[ORM\Column]
    private ?int $month = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $is_for_private_lessons = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $is_sepa_xml_generated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sepa_xml_generated_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentId(): ?Student
    {
        return $this->student_id;
    }

    public function setStudentId(?Student $student_id): static
    {
        $this->student_id = $student_id;

        return $this;
    }

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

    public function getBaseAmount(): ?float
    {
        return $this->base_amount;
    }

    public function setBaseAmount(?float $base_amount): static
    {
        $this->base_amount = $base_amount;

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

    public function getIsForPrivateLessons(): ?int
    {
        return $this->is_for_private_lessons;
    }

    public function setIsForPrivateLessons(?int $is_for_private_lessons): static
    {
        $this->is_for_private_lessons = $is_for_private_lessons;

        return $this;
    }

    public function getIsSepaXmlGenerated(): ?int
    {
        return $this->is_sepa_xml_generated;
    }

    public function setIsSepaXmlGenerated(?int $is_sepa_xml_generated): static
    {
        $this->is_sepa_xml_generated = $is_sepa_xml_generated;

        return $this;
    }

    public function getSepaXmlGeneratedDate(): ?\DateTimeInterface
    {
        return $this->sepa_xml_generated_date;
    }

    public function setSepaXmlGeneratedDate(?\DateTimeInterface $sepa_xml_generated_date): static
    {
        $this->sepa_xml_generated_date = $sepa_xml_generated_date;

        return $this;
    }
}
