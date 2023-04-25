<?php

namespace App\Entity;

use App\Repository\ItineraryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItineraryRepository::class)]
class Itinerary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $day = null;

    #[ORM\Column(length: 50)]
    private ?string $activity = null;

    #[ORM\Column(length: 100)]
    private ?string $restaurant = null;

    #[ORM\Column(length: 100)]
    private ?string $accomodation = null;

    #[ORM\OneToOne(inversedBy: 'itinerary', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SelectedTrip $selectedTrip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getRestaurant(): ?string
    {
        return $this->restaurant;
    }

    public function setRestaurant(string $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getAccomodation(): ?string
    {
        return $this->accomodation;
    }

    public function setAccomodation(string $accomodation): self
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    public function getSelectedTrip(): ?SelectedTrip
    {
        return $this->selectedTrip;
    }

    public function setSelectedTrip(SelectedTrip $selectedTrip): self
    {
        $this->selectedTrip = $selectedTrip;

        return $this;
    }
}
