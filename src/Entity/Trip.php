<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TripRepository::class)]
class Trip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $destination = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $characteristics = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 100)]
    private ?string $host = null;

    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection $trip_item;

    #[ORM\Column(length: 255)]
    private ?string $award = null;

    public function __construct()
    {
        $this->trip_item = new ArrayCollection();
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

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCharacteristics(): ?string
    {
        return $this->characteristics;
    }

    public function setCharacteristics(string $characteristics): self
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getTripItem(): Collection
    {
        return $this->trip_item;
    }

    public function addTripItem(Item $tripItem): self
    {
        if (!$this->trip_item->contains($tripItem)) {
            $this->trip_item->add($tripItem);
        }

        return $this;
    }

    public function removeTripItem(Item $tripItem): self
    {
        $this->trip_item->removeElement($tripItem);

        return $this;
    }

    public function getAward(): ?string
    {
        return $this->award;
    }

    public function setAward(string $award): self
    {
        $this->award = $award;

        return $this;
    }
}
