<?php

namespace App\Entity;

use App\Repository\MandatoryItemTripRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MandatoryItemTripRepository::class)]
class MandatoryItemTrip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $fk_item = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trip $fk_trip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkItem(): ?Item
    {
        return $this->fk_item;
    }

    public function setFkItem(?Item $fk_item): self
    {
        $this->fk_item = $fk_item;

        return $this;
    }

    public function getFkTrip(): ?Trip
    {
        return $this->fk_trip;
    }

    public function setFkTrip(?Trip $fk_trip): self
    {
        $this->fk_trip = $fk_trip;

        return $this;
    }
}
