<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 15.02.2017
 * Time: 18:33
 */

namespace Ias\GameBundle\Form;

use Ias\GameBundle\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
            ->add('dueDate', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'datetime-piker'

                ],

            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6,
                    'placeholder' => "This yor comment"
                ]
            ])
            /**
             * Присоединили поле из другой формы. Настройка поля соответственно в другой форме
             */
            ->add('category', CategoryType::class)
            ->add('tags', CollectionType::class, array(
                'entry_type' => TagType::class,
                'allow_add' => true, // Позволяет добавлять неизвестное число тэгов
            ));
//            ->add('save', SubmitType::class, [
//                'label' => 'Создать запись',
//                'attr' => [
//                    'class' => 'btn btn-success btn-raised'
//                ]
//            ]);

        $builder->get('dueDate')->addModelTransformer(new CallbackTransformer(
            function ($convertDateAsString) {
                return $convertDateAsString->format("d-m-Y H:i:s");
            },
            function ($convertDateAsRussianType) {
                return new \DateTime($convertDateAsRussianType);
            }
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Task::class,
        ));
    }
}