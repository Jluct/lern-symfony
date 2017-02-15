<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 15.02.2017
 * Time: 18:33
 */

namespace Ias\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dueDate', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6,
                    'placeholder' => "This yor comment"
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Создать запись',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }
}