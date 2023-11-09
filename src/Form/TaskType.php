<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // title (150 chars), description (255)
            ->add('title', null, [
                'attr' => [
                    'maxlength' => 150,
                ],    
            ])
            ->add('description')
            // ->add('creationDate')
            ->add('categories', null, [
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'choices' => $options['user']->getCategories()
            ])
           // ->add('creator')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
            'user' => null
        ]);
    }
}
