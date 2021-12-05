<?php

namespace App\Entity;

use App\Repository\FazendaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FazendaRepository::class)
 */
class Fazenda
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
    private string $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $endereco;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $referencia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $complemento;

    /**
     * @ORM\ManyToOne(targetEntity=Pessoa::class, inversedBy="fazendas")
     * @ORM\JoinColumn(nullable=false)
     */
    private Pessoa $proprietario;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $grupoProprietario;

    /**
     * @ORM\ManyToOne(targetEntity=Estado::class, inversedBy="fazendas")
     * @ORM\JoinColumn(nullable=false)
     */
    private Estado $estado;

    /**
     * @ORM\ManyToOne(targetEntity=Cidade::class, inversedBy="fazendas")
     * @ORM\JoinColumn(nullable=false)
     */
    private Cidade $cidade;

    /**
     * @ORM\OneToMany(targetEntity=Lote::class, mappedBy="fazenda")
     */
    private Collection $lotes;

    public function __construct()
    {
        $this->lotes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(?string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getProprietario(): ?Pessoa
    {
        return $this->proprietario;
    }

    public function setProprietario(?Pessoa $proprietario): self
    {
        $this->proprietario = $proprietario;

        return $this;
    }

    public function getGrupoProprietario(): ?string
    {
        return $this->grupoProprietario;
    }

    public function setGrupoProprietario(?string $grupoProprietario): self
    {
        $this->grupoProprietario = $grupoProprietario;

        return $this;
    }

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCidade(): ?Cidade
    {
        return $this->cidade;
    }

    public function setCidade(?Cidade $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * @return Collection|Lote[]
     */
    public function getLotes(): Collection
    {
        return $this->lotes;
    }

    public function addLote(Lote $lote): self
    {
        if (!$this->lotes->contains($lote)) {
            $this->lotes[] = $lote;
            $lote->setFazenda($this);
        }

        return $this;
    }

    public function removeLote(Lote $lote): self
    {
        if ($this->lotes->removeElement($lote)) {
            // set the owning side to null (unless already changed)
            if ($lote->getFazenda() === $this) {
                $lote->setFazenda(null);
            }
        }

        return $this;
    }
}
