<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?string $cardnum = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $carddate = null;

    #[ORM\Column(nullable: true)]
    private ?int $cardcrypto = null;

    #[ORM\Column(nullable: true)]
    private ?bool $save = null;

// ##################################################################### //
// ########################### GETTER/SETTER ########################### //
// ##################################################################### //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCardnum(): ?string
    {
        return $this->cardnum;
    }

    public function setCardnum(string $cardnum): self
    {
        $this->cardnum = $cardnum;

        return $this;
    }

    public function getCarddate(): ?\DateTimeInterface
    {
        return $this->carddate;
    }

    public function setCarddate(\DateTimeInterface $carddate): self
    {
        $this->carddate = $carddate;

        return $this;
    }

    public function getCardcrypto(): ?int
    {
        return $this->cardcrypto;
    }

    public function setCardcrypto(int $cardcrypto): self
    {
        $this->cardcrypto = $cardcrypto;

        return $this;
    }

    public function isSave(): ?bool
    {
        return $this->save;
    }

    public function setSave(?bool $save): self
    {
        $this->save = $save;

        return $this;
    }
}
