<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\User;
use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('state')
            ->add('user', EntityType::class,
            ['class'=>'App\Entity\User',
                'choice_label'=>'firstName',
                'multiple'=>false,
                'expanded'=>false])
            ->add('project', EntityType::class, 
            ['class'=>'App\Entity\Project',
                'choice_label'=>'title',
                'multiple'=>false,
                'expanded'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
