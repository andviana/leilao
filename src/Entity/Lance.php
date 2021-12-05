<?php

namespace App\Entity;

use App\Repository\LanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanceRepository::class)
 */
class Lance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private float $valor;

    /**
     * @ORM\ManyToOne(targetEntity=Lote::class, inversedBy="lances")
     * @ORM\JoinColumn(nullable=false)
     */
    private Lote $lote;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getLote(): ?Lote
    {
        return $this->lote;
    }

    public function setLote(?Lote $lote): self
    {
        $this->lote = $lote;

        return $this;
    }
}
