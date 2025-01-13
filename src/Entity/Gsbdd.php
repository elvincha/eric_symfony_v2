<?php

// src/Entity/Gsbdd.php
namespace App\Entity;

use App\Repository\GsbddRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GsbddRepository::class)]
#[ORM\Table(name: 'gsbdd')]
class Gsbdd
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_gsbdd', type: 'integer')]
    #[ORM\GeneratedValue]
    private $id_gsbdd;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_gsbdd;

    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    #[ORM\Column(name: 'indic_ecole', type: 'smallint')]
    private $indic_ecole;

    #[ORM\Column(name: 'indic_hors_ecole', type: 'smallint')]
    private $indic_hors_ecole;

    #[ORM\Column(name: 'indic_opex_isole', type: 'smallint')]
    private $indic_opex_isole;

    #[ORM\Column(name: 'indic_opex_unite', type: 'smallint')]
    private $indic_opex_unite;

    // Getters et Setters

    public function getIdGsbdd(): ?int
    {
        return $this->id_gsbdd;
    }

    public function getNomGsbdd(): ?string
    {
        return $this->nom_gsbdd;
    }

    public function setNomGsbdd(string $nom_gsbdd): self
    {
        $this->nom_gsbdd = $nom_gsbdd;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getIndicEcole(): ?bool
    {
        // Convertit le smallint en booléen
        return $this->indic_ecole === 1;
    }

    public function setIndicEcole(bool $indic_ecole): self
    {
        // Stocke comme smallint (1 pour true, 0 pour false)
        $this->indic_ecole = $indic_ecole ? 1 : 0;

        return $this;
    }

    public function getIndicHorsEcole(): ?bool
    {
        return $this->indic_hors_ecole === 1;
    }

    public function setIndicHorsEcole(bool $indic_hors_ecole): self
    {
        $this->indic_hors_ecole = $indic_hors_ecole ? 1 : 0;

        return $this;
    }

    public function getIndicOpexIsole(): ?bool
    {
        return $this->indic_opex_isole === 1;
    }

    public function setIndicOpexIsole(bool $indic_opex_isole): self
    {
        $this->indic_opex_isole = $indic_opex_isole ? 1 : 0;

        return $this;
    }

    public function getIndicOpexUnite(): ?bool
    {
        return $this->indic_opex_unite === 1;
    }

    public function setIndicOpexUnite(bool $indic_opex_unite): self
    {
        $this->indic_opex_unite = $indic_opex_unite ? 1 : 0;

        return $this;
    }
}
