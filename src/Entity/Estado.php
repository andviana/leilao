<?php

namespace App\Entity;

use App\Repository\EstadosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadosRepository::class)
 */
class Estado
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $nome;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private string $uf;

    /**
     * @ORM\OneToMany(targetEntity=Cidade::class, mappedBy="estado")
     */
    private Collection $cidades;

    /**
     * @ORM\OneToMany(targetEntity=Pessoa::class, mappedBy="estado")
     */
    private Collection $pessoas;

    /**
     * @ORM\OneToMany(targetEntity=Fazenda::class, mappedBy="estado")
     */
    private Collection $fazendas;

    /**
     * @ORM\OneToMany(targetEntity=Leilao::class, mappedBy="estado")
     */
    private Collection $leiloes;

    public function __construct()
    {
        $this->cidades = new ArrayCollection();
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

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * @return Collection|Cidade[]
     */
    public function getCidades(): Collection
    {
        return $this->cidades;
    }

    public function addCidade(Cidade $cidade): self
    {
        if (!$this->cidades->contains($cidade)) {
            $this->cidades[] = $cidade;
            $cidade->setEstado($this);
        }

        return $this;
    }

    public function removeCidade(Cidade $cidade): self
    {
        if ($this->cidades->removeElement($cidade)) {
            // set the owning side to null (unless already changed)
            if ($cidade->getEstado() === $this) {
                $cidade->setEstado(null);
            }
        }

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
            $pessoa->setEstado($this);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): self
    {
        if ($this->pessoas->removeElement($pessoa)) {
            // set the owning side to null (unless already changed)
            if ($pessoa->getEstado() === $this) {
                $pessoa->setEstado(null);
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
            $fazenda->setEstado($this);
        }

        return $this;
    }

    public function removeFazenda(Fazenda $fazenda): self
    {
        if ($this->fazendas->removeElement($fazenda)) {
            // set the owning side to null (unless already changed)
            if ($fazenda->getEstado() === $this) {
                $fazenda->setEstado(null);
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
            $leilao->setEstado($this);
        }

        return $this;
    }

    public function removeLeilao(Leilao $leilao): self
    {
        if ($this->leiloes->removeElement($leilao)) {
            // set the owning side to null (unless already changed)
            if ($leilao->getEstado() === $this) {
                $leilao->setEstado(null);
            }
        }

        return $this;
    }
}
