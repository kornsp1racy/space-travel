<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $user_item;


    public function __construct()
    {
        $this->user_item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, User>
     */
    public function getUserItem(): Collection
    {
        return $this->user_item;
    }

    public function addUserItem(User $userItem): self
    {
        if (!$this->user_item->contains($userItem)) {
            $this->user_item->add($userItem);
        }

        return $this;
    }

    public function removeUserItem(User $userItem): self
    {
        $this->user_item->removeElement($userItem);

        return $this;
    }

}
