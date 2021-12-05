<?php

namespace App\Entity;

use App\Repository\CidadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CidadesRepository::class)
 */
class Cidade
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
     * @ORM\ManyToOne(targetEntity=Estado::class, inversedBy="cidades")
     * @ORM\JoinColumn(nullable=false)
     */
    private Estado $estado;

    /**
     * @ORM\OneToMany(targetEntity=Pessoa::class, mappedBy="cidade")
     */
    private Collection $pessoas;

    /**
     * @ORM\OneToMany(targetEntity=Fazenda::class, mappedBy="cidade")
     */
    private Collection $fazendas;

    /**
     * @ORM\OneToMany(targetEntity=Leilao::class, mappedBy="cidade")
     */
    private Collection $leiloes;

    public function __construct()
    {
        $this->pessoas = new ArrayCollection();
        $this->fazendas = new ArrayCollection();
        $this->leiloes = new ArrayCollection();
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

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Pessoa[]
     */
    public function getPessoas(): Collection
    {
        return $this->pessoas;
    }

    public function addPessoa(Pessoa $pessoa): self
    {
        if (!$this->pessoas->contains($pessoa)) {
            $this->pessoas[] = $pessoa;
            $pessoa->setCidade($this);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): self
    {
        if ($this->pessoas->removeElement($pessoa)) {
            // set the owning side to null (unless already changed)
            if ($pessoa->getCidade() === $this) {
                $pessoa->setCidade(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fazenda[]
     */
    public function getFazendas(): Collection
    {
        return $this->fazendas;
    }

    public function addFazenda(Fazenda $fazenda): self
    {
        if (!$this->fazendas->contains($fazenda)) {
            $this->fazendas[] = $fazenda;
            $fazenda->setCidade($this);
        }

        return $this;
    }

    public function removeFazenda(Fazenda $fazenda): self
    {
        if ($this->fazendas->removeElement($fazenda)) {
            // set the owning side to null (unless already changed)
            if ($fazenda->getCidade() === $this) {
                $fazenda->setCidade(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Leilao[]
     */
    public function getLeiloes(): Collection
    {
        return $this->leiloes;
    }

    public function addLeilao(Leilao $leilao): self
    {
        if (!$this->leiloes->contains($leilao)) {
            $this->leiloes[] = $leilao;
            $leilao->setCidade($this);
        }

        return $this;
    }

    public function removeLeilao(Leilao $leilao): self
    {
        if ($this->leiloes->removeElement($leilao)) {
            // set the owning side to null (unless already changed)
            if ($leilao->getCidade() === $this) {
                $leilao->setCidade(null);
            }
        }

        return $this;
    }
}
