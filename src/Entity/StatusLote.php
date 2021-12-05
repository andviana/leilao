<?php

namespace App\Entity;

use App\Repository\StatusLoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusLoteRepository::class)
 */
class StatusLote
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
     * @ORM\OneToMany(targetEntity=Lote::class, mappedBy="statusLote")
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
            $lote->setStatusLote($this);
        }

        return $this;
    }

    public function removeLote(Lote $lote): self
    {
        if ($this->lotes->removeElement($lote)) {
            // set the owning side to null (unless already changed)
            if ($lote->getStatusLote() === $this) {
                $lote->setStatusLote(null);
            }
        }

        return $this;
    }
}
