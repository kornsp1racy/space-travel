<?php

namespace App\Entity;

use App\Repository\PackingListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackingListRepository::class)]
class PackingList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'packingLists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;
    
    #[ORM\ManyToOne(inversedBy: 'packingLists')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?SelectedTrip $selectedTrip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getSelectedTrip(): ?SelectedTrip
    {
        return $this->selectedTrip;
    }

    public function setSelectedTrip(?SelectedTrip $selectedTrip): self
    {
        $this->selectedTrip = $selectedTrip;

        return $this;
    }
}
