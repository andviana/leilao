<?php

namespace App\Entity;

use App\Repository\TelefoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelefoneRepository::class)
 */
class Telefone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private string $ddd;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private string $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $nomeContato;

    /**
     * @ORM\ManyToOne(targetEntity=Pessoa::class, inversedBy="telefones")
     * @ORM\JoinColumn(nullable=false)
     */
    private Pessoa $pessoa;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $ativo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    public function setDdd(string $ddd): self
    {
        $this->ddd = $ddd;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNomeContato(): ?string
    {
        return $this->nomeContato;
    }

    public function setNomeContato(?string $nomeContato): self
    {
        $this->nomeContato = $nomeContato;

        return $this;
    }

    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(?Pessoa $pessoa): self
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    public function getAtivo(): ?bool
    {
        return $this->ativo;
    }

    public function setAtivo(?bool $ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }
}
