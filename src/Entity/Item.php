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


    #[ORM\OneToMany(mappedBy: 'item', targetEntity: PackingList::class)]
    private Collection $packingLists;


    public function __construct()
    {
        $this->packingLists = new ArrayCollection();
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
     * @return Collection<int, PackingList>
     */
    public function getPackingLists(): Collection
    {
        return $this->packingLists;
    }

    public function addPackingList(PackingList $packingList): self
    {
        if (!$this->packingLists->contains($packingList)) {
            $this->packingLists->add($packingList);
            $packingList->setItem($this);
        }

        return $this;
    }

    public function removePackingList(PackingList $packingList): self
    {
        if ($this->packingLists->removeElement($packingList)) {
            // set the owning side to null (unless already changed)
            if ($packingList->getItem() === $this) {
                $packingList->setItem(null);
            }
        }

        return $this;
    }

}
