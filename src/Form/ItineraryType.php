<?php

namespace App\Form;

use App\Entity\Itinerary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItineraryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, ['choices' => [
                'Monday' => 'Monday',
                'Tuesday' => 'Tuesday',
                'Wednesday' => 'wednesday',
                'Thursday' => 'Thursday',
                'Friday' => 'Friday',
                'Saturday' => 'Saturday',
                'Sunday' => 'Sunday',
            ]])
            ->add('activity', ChoiceType::class, ['choices' => [
                'Exploration' => 'Exploration',
                'Adventure Sports' => 'Adventure Sports',
                'Cultural Experiences' => 'Cultural Experiences',
                'Earth Observation' => 'Earth Observation',
                'Science Experiments' => 'Science Experiments',
                'Zero-gravity Activities' => 'Zero-gravity Activities',
                'Admiring Stars' => 'Admiring Stars',
            ]])
            ->add('restaurant', ChoiceType::class, ['choices' => [
                'McDonalds' => 'McDonalds',
                'Burger King' => 'Burger King',
                'Kentucky Fried Chicken' => 'Kentucky Fried Chicken',
                'Dominos' => 'Dominos',
                'Taco Bell' => 'Taco Bell',
                'Wendys' => 'Wendys',
                'Subway' => 'Subway',
            ]])
            ->add('accommodation', ChoiceType::class, ['choices' => [
                'Underground Habitat' => 'Underground Habitat',
                'Modular Habitat' => 'Modular Habitat',
                'Greenhouse' => 'Greenhouse',
                'Aurora Space Station' => 'Aurora Space Station',
                'Space Shuttle' => 'Space Shuttle'
            ]])
            ->add('day_two', ChoiceType::class, ['choices' => [
                'Monday' => 'Monday',
                'Tuesday' => 'Tuesday',
                'Wednesday' => 'wednesday',
                'Thursday' => 'Thursday',
                'Friday' => 'Friday',
                'Saturday' => 'Saturday',
                'Sunday' => 'Sunday',
            ]])
            ->add('activity_two', ChoiceType::class, ['choices' => [
                'Exploration' => 'Exploration',
                'Adventure Sports' => 'Adventure Sports',
                'Cultural Experiences' => 'Cultural Experiences',
                'Earth Observation' => 'Earth Observation',
                'Science Experiments' => 'Science Experiments',
                'Zero-gravity Activities' => 'Zero-gravity Activities',
                'Admiring Stars' => 'Admiring Stars',
            ]])
            ->add('restaurant_two', ChoiceType::class, ['choices' => [
                'McDonalds' => 'McDonalds',
                'Burger King' => 'Burger King',
                'Kentucky Fried Chicken' => 'Kentucky Fried Chicken',
                'Dominos' => 'Dominos',
                'Taco Bell' => 'Taco Bell',
                'Wendys' => 'Wendys',
                'Subway' => 'Subway',
            ]])
            ->add('accommodation_two', ChoiceType::class, ['choices' => [
                'Underground Habitat' => 'Underground Habitat',
                'Modular Habitat' => 'Modular Habitat',
                'Greenhouse' => 'Greenhouse',
                'Aurora Space Station' => 'Aurora Space Station',
                'Space Shuttle' => 'Space Shuttle'
            ]])
            ->add('day_three', ChoiceType::class, ['choices' => [
                'Monday' => 'Monday',
                'Tuesday' => 'Tuesday',
                'Wednesday' => 'wednesday',
                'Thursday' => 'Thursday',
                'Friday' => 'Friday',
                'Saturday' => 'Saturday',
                'Sunday' => 'Sunday',
            ]])
            ->add('activity_three', ChoiceType::class, ['choices' => [
                'Exploration' => 'Exploration',
                'Adventure Sports' => 'Adventure Sports',
                'Cultural Experiences' => 'Cultural Experiences',
                'Earth Observation' => 'Earth Observation',
                'Science Experiments' => 'Science Experiments',
                'Zero-gravity Activities' => 'Zero-gravity Activities',
                'Admiring Stars' => 'Admiring Stars',
            ]])
            ->add('restaurant_three', ChoiceType::class, ['choices' => [
                'McDonalds' => 'McDonalds',
                'Burger King' => 'Burger King',
                'Kentucky Fried Chicken' => 'Kentucky Fried Chicken',
                'Dominos' => 'Dominos',
                'Taco Bell' => 'Taco Bell',
                'Wendys' => 'Wendys',
                'Subway' => 'Subway',
            ]])
            ->add('accommodation_three', ChoiceType::class, ['choices' => [
                'Underground Habitat' => 'Underground Habitat',
                'Modular Habitat' => 'Modular Habitat',
                'Greenhouse' => 'Greenhouse',
                'Aurora Space Station' => 'Aurora Space Station',
                'Space Shuttle' => 'Space Shuttle'
            ]])
            // ->add('selectedTrip')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Itinerary::class,
        ]);
    }
}
