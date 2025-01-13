<?php

namespace App\Entity;

use App\Repository\SaisieTauxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisieTauxRepository::class)]
class SaisieTaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $session = null;

    #[ORM\Column]
    private ?int $id_user_acess = null;

    #[ORM\Column(length: 7)]
    private ?string $periode = null;
    #[ORM\ManyToOne(targetEntity: Armee::class)]
    #[ORM\JoinColumn(name: "id_armee", referencedColumnName: "id_armee", nullable: true)]
    private ?Armee $armee = null;
    #[ORM\Column(nullable: true)]
    private ?int $id_armee = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectif_prev = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectif_inc = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectif_equip = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_edit = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $non_concerne = null;

    #[ORM\Column(nullable: false)]
    private ?int $id_gsbdd = null; // Ajout de la colonne id_gsbdd


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getSession(): ?int
    {
        return $this->session;
    }

    public function setSession(?int $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getIdUserAcess(): ?int
    {
        return $this->id_user_acess;
    }

    public function setIdUserAcess(int $id_user_acess): static
    {
        $this->id_user_acess = $id_user_acess;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): static
    {
        $this->periode = $periode;

        return $this;
    }
    public function getArmee(): ?Armee
    {
        return $this->armee;
    }

    public function setArmee(?Armee $armee): static
    {
        $this->armee = $armee;
        return $this;
    }

    public function getIdArmee(): ?int
    {
        return $this->id_armee;
    }

    public function setIdArmee(?int $id_armee): static
    {
        $this->id_armee = $id_armee;

        return $this;
    }

    public function getEffectifPrev(): ?int
    {
        return $this->effectif_prev;
    }

    public function setEffectifPrev(?int $effectif_prev): static
    {
        $this->effectif_prev = $effectif_prev;

        return $this;
    }

    public function getEffectifInc(): ?int
    {
        return $this->effectif_inc;
    }

    public function setEffectifInc(?int $effectif_inc): static
    {
        $this->effectif_inc = $effectif_inc;

        return $this;
    }

    public function getEffectifEquip(): ?int
    {
        return $this->effectif_equip;
    }

    public function setEffectifEquip(?int $effectif_equip): static
    {
        $this->effectif_equip = $effectif_equip;

        return $this;
    }

    public function getDateEdit(): ?\DateTimeInterface
    {
        return $this->date_edit;
    }

    public function setDateEdit(\DateTimeInterface $date_edit): static
    {
        $this->date_edit = $date_edit;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNonConcerne(): ?int
    {
        return $this->non_concerne;
    }

    public function setNonConcerne(?int $non_concerne): static
    {
        $this->non_concerne = $non_concerne;

        return $this;
    }
    public function getIdGsbdd(): ?int // Méthode pour id_gsbdd
    {
        return $this->id_gsbdd;
    }

    public function setIdGsbdd(int $id_gsbdd): static // Méthode pour id_gsbdd
    {
        $this->id_gsbdd = $id_gsbdd;

        return $this;
    }
}
