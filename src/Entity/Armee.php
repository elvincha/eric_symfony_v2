<?php

namespace App\Entity;

use App\Repository\ArmeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmeeRepository::class)]
class Armee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_armee', type: 'integer',nullable: true)]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_armee = null;

    #[ORM\Column(length: 10)]
    private ?string $trigramme_armee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArmee(): ?string
    {
        return $this->nom_armee;
    }

    public function setNomArmee(string $nom_armee): static
    {
        $this->nom_armee = $nom_armee;

        return $this;
    }

    public function getTrigrammeArmee(): ?string
    {
        return $this->trigramme_armee;
    }

    public function setTrigrammeArmee(string $trigramme_armee): static
    {
        $this->trigramme_armee = $trigramme_armee;

        return $this;
    }
}
