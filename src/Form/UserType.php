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
            ->add('email', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            ->add('roles', ChoiceType::class,[
                "choices" => [
                    "User" => "ROLE_USER",
                    "Admin" => "ROLE_ADMIN"
                ], "attr" => ["class" => "m-1 form-control"]
            ])
            ->add('first_name', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            ->add('last_name', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            ->add('address', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            ->add('passport', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            ->add('phone', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
            // ->add('image', TextType::class, ["attr" =>["class" => "my-1 form-control"]])
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
