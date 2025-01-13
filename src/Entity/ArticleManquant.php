<?php
namespace App\Entity;

use App\Repository\ArticleManquantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleManquantRepository::class)]
#[ORM\Table(name: "articles_manquants")]
class ArticleManquant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_saisie = null;  // Utilisation de int pour stocker l'id de saisie

    #[ORM\Column(length: 255)]
    private ?string $rag = null;

    #[ORM\Column]
    private ?int $nb = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSaisie(): ?int
    {
        return $this->id_saisie;
    }

    public function setIdSaisie(int $id_saisie): static
    {
        $this->id_saisie = $id_saisie;

        return $this;
    }

    public function getRag(): ?string
    {
        return $this->rag;
    }

    public function setRag(string $rag): static
    {
        $this->rag = $rag;

        return $this;
    }
    public function getNb(): ?int
    {
        return $this->nb;
    }

    public function setNb(int $nb): static
    {
        $this->nb = $nb;

        return $this;
    }
    public function getNomArticle(): ?string
    {
        return $this->nom_article;
    }
    public function setNomArticle(string $nom_article): static{
        $this->nom_article = $nom_article;
        return $this;
    }
}
