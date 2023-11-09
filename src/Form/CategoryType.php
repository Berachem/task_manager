<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\TaskRepository;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
           // ->add('creationDate')
            //->add('creator')
            ->add('tasks', null, [
                'choice_label' => 'title',
                'expanded' => true,
                'multiple' => true,
                'choices' => $options['user']->getTasks()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
            'user' => null
        ]);
    }
}
