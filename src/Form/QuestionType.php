<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'questionerName',
                null,
                [
                    'label' => 'Neved',
                    'required' => false,
                    'attr' => [
                        'maxlength' => 64,
                    ],
                ]
            )
            ->add(
                'questionerEmail',
                TextType::class,
                [
                    'label' => 'E-mail címed',
                    'required' => false,
                    'attr' => [
                        'maxlength' => 180,
                    ],
                ]
            )
            ->add(
                'body',
                TextareaType::class,
                [
                    'label' => 'Üzenet szövege',
                    'required' => false,
                    'attr' => [
                        'maxlength' => 255,
                    ],
                ]
            )
            ->add('submit', SubmitType::class, [
                'label' => 'Küldés',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => Question::class,
            ]
        );
    }
}
