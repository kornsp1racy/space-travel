<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, ["attr" =>["class" => "m-1 form-control"]])
            ->add('roles', ChoiceType::class,[
                "choices" => [
                    "User" => "ROLE_USER",
                    "Admin" => "ROLE_ADMIN"
                ]
            ])
            ->add('first_name', TextType::class, ["attr" =>["class" => ""]])
            ->add('last_name', TextType::class, ["attr" =>["class" => ""]])
            ->add('address', TextType::class, ["attr" =>["class" => ""]])
            ->add('passport', TextType::class, ["attr" =>["class" => ""]])
            ->add('phone', TextType::class, ["attr" =>["class" => ""]])
            ->add('image', TextType::class, ["attr" =>["class" => ""]])
        ;

        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
