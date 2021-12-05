<?php

namespace App\Entity;

use App\Repository\LoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoteRepository::class)
 */
class Lote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $numero;

    /**
     * @ORM\Column(type="integer")
     */
    private int $quantidade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $sexo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $prazo;

    /**
     * @ORM\ManyToOne(targetEntity=Leilao::class, inversedBy="lotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private Leilao $leilao;

    /**
     * @ORM\ManyToOne(targetEntity=Fazenda::class, inversedBy="lotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private Fazenda $fazenda;

    /**
     * @ORM\ManyToOne(targetEntity=StatusLote::class, inversedBy="lotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private StatusLote $statusLote;

    /**
     * @ORM\OneToMany(targetEntity=Imagem::class, mappedBy="lote")
     */
    private Collection $imagens;

    /**
     * @ORM\OneToMany(targetEntity=Lance::class, mappedBy="lote")
     */
    private Collection $lances;

    public function __construct()
    {
        $this->imagens = new ArrayCollection();
        $this->lances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getPrazo(): ?string
    {
        return $this->prazo;
    }

    public function setPrazo(string $prazo): self
    {
        $this->prazo = $prazo;

        return $this;
    }

    public function getLeilao(): ?Leilao
    {
        return $this->leilao;
    }

    public function setLeilao(?Leilao $leilao): self
    {
        $this->leilao = $leilao;

        return $this;
    }

    public function getFazenda(): ?Fazenda
    {
        return $this->fazenda;
    }

    public function setFazenda(?Fazenda $fazenda): self
    {
        $this->fazenda = $fazenda;

        return $this;
    }

    public function getStatusLote(): ?StatusLote
    {
        return $this->statusLote;
    }

    public function setStatusLote(?StatusLote $statusLote): self
    {
        $this->statusLote = $statusLote;

        return $this;
    }

    /**
     * @return Collection|Imagem[]
     */
    public function getImagens(): Collection
    {
        return $this->imagens;
    }

    public function addImagem(Imagem $imagem): self
    {
        if (!$this->imagens->contains($imagem)) {
            $this->imagens[] = $imagem;
            $imagem->setLote($this);
        }

        return $this;
    }

    public function removeImagem(Imagem $imagem): self
    {
        if ($this->imagens->removeElement($imagem)) {
            // set the owning side to null (unless already changed)
            if ($imagem->getLote() === $this) {
                $imagem->setLote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lance[]
     */
    public function getLances(): Collection
    {
        return $this->lances;
    }

    public function addLance(Lance $lance): self
    {
        if (!$this->lances->contains($lance)) {
            $this->lances[] = $lance;
            $lance->setLote($this);
        }

        return $this;
    }

    public function removeLance(Lance $lance): self
    {
        if ($this->lances->removeElement($lance)) {
            // set the owning side to null (unless already changed)
            if ($lance->getLote() === $this) {
                $lance->setLote(null);
            }
        }

        return $this;
    }
}
