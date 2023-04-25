<?php

namespace App\Entity;

use App\Repository\SelectedTripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SelectedTripRepository::class)]
class SelectedTrip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'selectedTrips', targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, name: 'user_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'selectedTrips')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trip $trip = null;

    #[ORM\OneToMany(mappedBy: 'selectedTrip', targetEntity: PackingList::class)]
    private Collection $packingLists;

    #[ORM\OneToMany(targetEntity: Itinerary::class, mappedBy: 'selectedTrip', cascade: ['persist', 'remove'])]
    private ?Collection $itinerary = null;

    public function __construct()
    {
        $this->packingLists = new ArrayCollection();
        $this->itinerary = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): self
    {
        $this->trip = $trip;

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
            $packingList->setSelectedTrip($this);
        }

        return $this;
    }

    public function removePackingList(PackingList $packingList): self
    {
        if ($this->packingLists->removeElement($packingList)) {
            // set the owning side to null (unless already changed)
            if ($packingList->getSelectedTrip() === $this) {
                $packingList->setSelectedTrip(null);
            }
        }

        return $this;
    }

    public function getItinerary(): ?Itinerary
    {
        return $this->itinerary;
    }

    public function setItinerary(Itinerary $itinerary): self
    {
        // set the owning side of the relation if necessary
        if ($itinerary->getSelectedTrip() !== $this) {
            $itinerary->setSelectedTrip($this);
        }

        $this->itinerary = $itinerary;

        return $this;
    }
}
