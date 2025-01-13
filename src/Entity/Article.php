<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "articles")]
class Article
{
    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private ?string $rag_article = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nom_article = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $rad_article = null;

    public function getId(): ?string
    {
        return $this->rag_article;
    }
    public function getRagArticle(): ?string
    {
        return $this->rag_article;
    }

    public function setRagArticle(string $rag_article): static
    {
        $this->rag_article = $rag_article;

        return $this;
    }

    public function getNomArticle(): ?string
    {
        return $this->nom_article;
    }

    public function setNomArticle(string $nom_article): static
    {
        $this->nom_article = $nom_article;

        return $this;
    }

    public function getRadArticle(): ?string
    {
        return $this->rad_article;
    }

    public function setRadArticle(string $rad_article): static
    {
        $this->rad_article = $rad_article;

        return $this;
    }
}
