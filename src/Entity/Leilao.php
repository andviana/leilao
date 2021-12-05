<?php

namespace App\Entity;

use App\Repository\LeilaoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeilaoRepository::class)
 */
class Leilao
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $data;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private string $dia;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private string $mes;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private string $ano;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $local;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $nome;

    /**
     * @ORM\ManyToOne(targetEntity=Cidade::class, inversedBy="leiloes")
     * @ORM\JoinColumn(nullable=false)
     */
    private Cidade $cidade;

    /**
     * @ORM\ManyToOne(targetEntity=Estado::class, inversedBy="leiloes")
     * @ORM\JoinColumn(nullable=false)
     */
    private Estado $estado;

    /**
     * @ORM\ManyToOne(targetEntity=TipoLeilao::class, inversedBy="leiloes")
     * @ORM\JoinColumn(nullable=false)
     */
    private TipoLeilao $tipoLeilao;

    /**
     * @ORM\ManyToOne(targetEntity=StatusLeilao::class, inversedBy="leiloes")
     * @ORM\JoinColumn(nullable=false)
     */
    private StatusLeilao $statusLeilao;

    /**
     * @ORM\OneToMany(targetEntity=NoticiaLeilao::class, mappedBy="leilao")
     */
    private Collection $noticiasLeilao;

    /**
     * @ORM\OneToMany(targetEntity=Lote::class, mappedBy="leilao")
     */
    private Collection $lotes;

    public function __construct()
    {
        $this->noticiasLeilao = new ArrayCollection();
        $this->lotes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getDia(): ?string
    {
        return $this->dia;
    }

    public function setDia(string $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getMes(): ?string
    {
        return $this->mes;
    }

    public function setMes(string $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function getAno(): ?string
    {
        return $this->ano;
    }

    public function setAno(string $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getLocal(): ?string
    {
        return $this->local;
    }

    public function setLocal(string $local): self
    {
        $this->local = $local;

        return $this;
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

    public function getCidade(): ?Cidade
    {
        return $this->cidade;
    }

    public function setCidade(?Cidade $cidade): self
    {
        $this->cidade = $cidade;

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

    public function getTipoLeilao(): ?TipoLeilao
    {
        return $this->tipoLeilao;
    }

    public function setTipoLeilao(?TipoLeilao $tipoLeilao): self
    {
        $this->tipoLeilao = $tipoLeilao;

        return $this;
    }

    public function getStatusLeilao(): ?StatusLeilao
    {
        return $this->statusLeilao;
    }

    public function setStatusLeilao(?StatusLeilao $statusLeilao): self
    {
        $this->statusLeilao = $statusLeilao;

        return $this;
    }

    /**
     * @return Collection|NoticiaLeilao[]
     */
    public function getNoticiasLeilao(): Collection
    {
        return $this->noticiasLeilao;
    }

    public function addNoticiaLeilao(NoticiaLeilao $noticiaLeilao): self
    {
        if (!$this->noticiasLeilao->contains($noticiaLeilao)) {
            $this->noticiasLeilao[] = $noticiaLeilao;
            $noticiaLeilao->setLeilao($this);
        }

        return $this;
    }

    public function removeNoticiaLeilao(NoticiaLeilao $noticiaLeilao): self
    {
        if ($this->noticiasLeilao->removeElement($noticiaLeilao)) {
            // set the owning side to null (unless already changed)
            if ($noticiaLeilao->getLeilao() === $this) {
                $noticiaLeilao->setLeilao(null);
            }
        }

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
            $lote->setLeilao($this);
        }

        return $this;
    }

    public function removeLote(Lote $lote): self
    {
        if ($this->lotes->removeElement($lote)) {
            // set the owning side to null (unless already changed)
            if ($lote->getLeilao() === $this) {
                $lote->setLeilao(null);
            }
        }

        return $this;
    }
}
