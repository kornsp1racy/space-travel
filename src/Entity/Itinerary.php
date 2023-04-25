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

    #[ORM\ManyToOne(targetEntity: SelectedTrip::class, inversedBy: 'itinerary', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SelectedTrip $selectedTrip = null;

    #[ORM\Column(length: 255)]
    private ?string $day_two = null;

    #[ORM\Column(length: 255)]
    private ?string $activity_two = null;

    #[ORM\Column(length: 255)]
    private ?string $restaurant_two = null;

    #[ORM\Column(length: 255)]
    private ?string $accommodation_two = null;

    #[ORM\Column(length: 255)]
    private ?string $day_three = null;

    #[ORM\Column(length: 255)]
    private ?string $activity_three = null;

    #[ORM\Column(length: 255)]
    private ?string $restaurant_three = null;

    #[ORM\Column(length: 255)]
    private ?string $accomodation_three = null;

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

    public function getDayTwo(): ?string
    {
        return $this->day_two;
    }

    public function setDayTwo(string $day_two): self
    {
        $this->day_two = $day_two;

        return $this;
    }

    public function getActivityTwo(): ?string
    {
        return $this->activity_two;
    }

    public function setActivityTwo(string $activity_two): self
    {
        $this->activity_two = $activity_two;

        return $this;
    }

    public function getRestaurantTwo(): ?string
    {
        return $this->restaurant_two;
    }

    public function setRestaurantTwo(string $restaurant_two): self
    {
        $this->restaurant_two = $restaurant_two;

        return $this;
    }

    public function getAccommodationTwo(): ?string
    {
        return $this->accommodation_two;
    }

    public function setAccommodationTwo(string $accommodation_two): self
    {
        $this->accommodation_two = $accommodation_two;

        return $this;
    }

    public function getDayThree(): ?string
    {
        return $this->day_three;
    }

    public function setDayThree(string $day_three): self
    {
        $this->day_three = $day_three;

        return $this;
    }

    public function getActivityThree(): ?string
    {
        return $this->activity_three;
    }

    public function setActivityThree(string $activity_three): self
    {
        $this->activity_three = $activity_three;

        return $this;
    }

    public function getRestaurantThree(): ?string
    {
        return $this->restaurant_three;
    }

    public function setRestaurantThree(string $restaurant_three): self
    {
        $this->restaurant_three = $restaurant_three;

        return $this;
    }

    public function getAccomodationThree(): ?string
    {
        return $this->accomodation_three;
    }

    public function setAccomodationThree(string $accomodation_three): self
    {
        $this->accomodation_three = $accomodation_three;

        return $this;
    }
}
