<?php

namespace App\Entity;

use App\Repository\ImagemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagemRepository::class)
 */
class Imagem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $texto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $arquivo;

    /**
     * @ORM\ManyToOne(targetEntity=Lote::class, inversedBy="imagens")
     * @ORM\JoinColumn(nullable=false)
     */
    private Lote $lote;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function getArquivo(): ?string
    {
        return $this->arquivo;
    }

    public function setArquivo(string $arquivo): self
    {
        $this->arquivo = $arquivo;

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
