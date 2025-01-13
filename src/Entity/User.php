<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_user')] // Spécifiez le nom de la colonne
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $user_session = null;

    #[ORM\Column(name: 'admin', type: 'smallint')]
    private ?int $admin_user = null;

    #[ORM\Column(length: 255)]
    private ?string $mail_adress = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserSession(): ?string
    {
        return $this->user_session;
    }

    public function setUserSession(string $user_session): static
    {
        $this->user_session = $user_session;

        return $this;
    }

    public function getAdminUser(): ?int
    {
        return $this->admin_user;
    }

    public function setAdminUser(int $admin_user): static
    {
        $this->admin_user = $admin_user;

        return $this;
    }

    public function getMailAdress(): ?string
    {
        return $this->mail_adress;
    }

    public function setMailAdress(string $mail_adress): static
    {
        $this->mail_adress = $mail_adress;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): static
    {
        $this->active = $active;

        return $this;
    }
}
