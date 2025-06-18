<?php

namespace App\Entity;

use App\Repository\TransacoeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransacoeRepository::class)]
class Transacoe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dataHora = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: 2)]
    private ?string $valor = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conta $contaOrigem = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conta $contaDestino = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataHora(): ?\DateTime
    {
        return $this->dataHora;
    }

    public function setDataHora(\DateTime $dataHora): static
    {
        $this->dataHora = $dataHora;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getContaOrigem(): ?Conta
    {
        return $this->contaOrigem;
    }

    public function setContaOrigem(?Conta $contaOrigem): static
    {
        $this->contaOrigem = $contaOrigem;

        return $this;
    }

    public function getContaDestino(): ?Conta
    {
        return $this->contaDestino;
    }

    public function setContaDestino(?Conta $contaDestino): static
    {
        $this->contaDestino = $contaDestino;

        return $this;
    }
}
