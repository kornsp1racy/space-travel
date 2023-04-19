<?php

namespace App\Entity;

use App\Repository\UserRewardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRewardRepository::class)]
class UserReward
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $fk_user_id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUserId(): ?user
    {
        return $this->fk_user_id;
    }

    public function setFkUserId(?user $fk_user_id): self
    {
        $this->fk_user_id = $fk_user_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
