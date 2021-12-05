<?php

namespace App\Entity;

use App\Repository\PessoaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PessoaRepository::class)
 */
class Pessoa
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
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private ?string $cpf;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private ?string $rg;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?\DateTimeInterface $nascimento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $endereco;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $bairro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $complemento;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private ?string $cep;

    /**
     * @ORM\ManyToOne(targetEntity=Estado::class, inversedBy="pessoas")
     * @ORM\JoinColumn(nullable=false)
     */
    private Estado $estado;

    /**
     * @ORM\ManyToOne(targetEntity=Cidade::class, inversedBy="pessoas")
     * @ORM\JoinColumn(nullable=false)
     */
    private Cidade $cidade;

    /**
     * @ORM\OneToMany(targetEntity=Fazenda::class, mappedBy="proprietario")
     */
    private Collection $fazendas;

    /**
     * @ORM\OneToMany(targetEntity=Telefone::class, mappedBy="pessoa", orphanRemoval=true)
     */
    private Collection $telefones;

    public function __construct()
    {
        $this->fazendas = new ArrayCollection();
        $this->telefones = new ArrayCollection();
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

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(?string $rg): self
    {
        $this->rg = $rg;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(?\DateTimeInterface $nascimento): self
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

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

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;

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
            $fazenda->setProprietario($this);
        }

        return $this;
    }

    public function removeFazenda(Fazenda $fazenda): self
    {
        if ($this->fazendas->removeElement($fazenda)) {
            // set the owning side to null (unless already changed)
            if ($fazenda->getProprietario() === $this) {
                $fazenda->setProprietario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Telefone[]
     */
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addTelefone(Telefone $telefone): self
    {
        if (!$this->telefones->contains($telefone)) {
            $this->telefones[] = $telefone;
            $telefone->setPessoa($this);
        }

        return $this;
    }

    public function removeTelefone(Telefone $telefone): self
    {
        if ($this->telefones->removeElement($telefone)) {
            // set the owning side to null (unless already changed)
            if ($telefone->getPessoa() === $this) {
                $telefone->setPessoa(null);
            }
        }

        return $this;
    }
}
