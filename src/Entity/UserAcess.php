<?php
namespace App\Entity;

use App\Entity\User;
use App\Repository\UserAcessRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserAcessRepository::class)]
class UserAcess
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_user_acess', type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id_user_acess = null;

    #[ORM\Column]
    private ?int $id_user = null;

    #[ORM\Column]
    private ?int $id_gsbdd = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $current_acess = null;

    public function getIdUserAcess(): ?int
    {
        return $this->id_user_acess;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdGsbdd(): ?int
    {
        return $this->id_gsbdd;
    }

    public function setIdGsbdd(int $id_gsbdd): static
    {
        $this->id_gsbdd = $id_gsbdd;

        return $this;
    }

    public function getCurrentAcess(): ?int
    {
        return $this->current_acess;
    }

    public function setCurrentAcess(int $current_acess): static
    {
        $this->current_acess = $current_acess;

        return $this;
    }


}
