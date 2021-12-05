<?php

namespace App\Entity;

use App\Repository\NoticiaLeilaoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoticiaLeilaoRepository::class)
 */
class NoticiaLeilao
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
     * @ORM\Column(type="string", length=1000)
     */
    private string $texto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $imagem;

    /**
     * @ORM\ManyToOne(targetEntity=Leilao::class, inversedBy="noticiaLeilaos")
     * @ORM\JoinColumn(nullable=false)
     */
    private Leilao $leilao;

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

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;

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
}
