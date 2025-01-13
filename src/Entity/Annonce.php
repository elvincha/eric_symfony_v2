<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_annonce', type: 'integer')]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $title_annonce = null;

    #[ORM\Column(length: 255)]
    private ?string $subtitle_annonce = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_annonce = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text_annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitleAnnonce(): ?string
    {
        return $this->title_annonce;
    }

    public function setTitleAnnonce(string $title_annonce): static
    {
        $this->title_annonce = $title_annonce;

        return $this;
    }

    public function getSubtitleAnnonce(): ?string
    {
        return $this->subtitle_annonce;
    }

    public function setSubtitleAnnonce(string $subtitle_annonce): static
    {
        $this->subtitle_annonce = $subtitle_annonce;

        return $this;
    }

    public function getDateAnnonce(): ?\DateTimeInterface
    {
        return $this->date_annonce;
    }

    public function setDateAnnonce(\DateTimeInterface $date_annonce): static
    {
        $this->date_annonce = $date_annonce;

        return $this;
    }

    public function getTextAnnonce(): ?string
    {
        return $this->text_annonce;
    }

    public function setTextAnnonce(string $text_annonce): static
    {
        $this->text_annonce = $text_annonce;

        return $this;
    }
}
