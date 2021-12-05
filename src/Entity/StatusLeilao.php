<?php

namespace App\Entity;

use App\Repository\StatusLeilaoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusLeilaoRepository::class)
 */
class StatusLeilao
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
    private string $denominacao;

    /**
     * @ORM\OneToMany(targetEntity=Leilao::class, mappedBy="statusLeilao")
     */
    private Collection $leiloes;

    public function __construct()
    {
        $this->leiloes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenominacao(): ?string
    {
        return $this->denominacao;
    }

    public function setDenominacao(string $denominacao): self
    {
        $this->denominacao = $denominacao;

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
            $leilao->setStatusLeilao($this);
        }

        return $this;
    }

    public function removeLeilao(Leilao $leilao): self
    {
        if ($this->leiloes->removeElement($leilao)) {
            // set the owning side to null (unless already changed)
            if ($leilao->getStatusLeilao() === $this) {
                $leilao->setStatusLeilao(null);
            }
        }

        return $this;
    }
}
