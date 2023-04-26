<?php
// src/Form/Type/TaskType.php
namespace App\Form;

use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class noteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ["attr" =>["class" => "m-1 form-control", "placeholder" => ""]])
            ->add('content', TextareaType::class, ["attr" =>["class" => "m-1 form-control"]])
           
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ], ["attr" =>["class" => "m-1 form-control"]])
            ->add('likes', IntegerType::class,[
                'label' => 'How do you rate your experience out of 100?',
            ], ["attr" =>["class" => "m-1 form-control", "placeholder" => "How do you rate your experience out of 100?"]])
            ->add('image', FileType::class, [
                'label' => 'Picture (image file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture file (png, jpeg, jpg)',
                    ])
                ],
            ], ["attr" =>["class" => "m-1 form-control"]])
            // ...
        

            ->add('save', SubmitType::class, ["attr" =>["class" => "save btn btn-light btn-orange fw-bold m-3"]])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}