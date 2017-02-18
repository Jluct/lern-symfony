<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 18.02.2017
 * Time: 22:38
 */

namespace Ias\GameBundle\Form;


use Ias\GameBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', ChoiceType::class, [
            //Список объектов, из них будет формироваться value option
            'choices' => [
                new Category('Cat1'),
                new Category('Cat2'),
                new Category('Cat3'),
                new Category('Cat4'),
            ],
            //Добавляем option название, которое будет отображаться пользователю
            'choice_label' => function (Category $category, $key, $index) {
                /** @var Category $category */
                return $category->getName();
            },
            //Добавляем option атрибуты
            'choice_attr' => function ($category, $key, $index) {
                return ['class' => 'category_' . strtolower($category->getName())];
            },
            //группировка
            'group_by' => function ($category, $key, $index) {
                // randomly assign things into 2 groups
                // return rand(0, 1) == 1 ? 'Group A' : 'Group B';
                return $index % 2 == 0 ? 'Group A' : 'Group B';
            },
            //Сепаратор? Разбивает на группы, первая часть до черты является предпочтительной?
//            'preferred_choices' => function ($category, $key, $index) {
//                return $category->getName() == 'Cat2' || $category->getName() == 'Cat3';
//            },
            'attr' => [
                'class' => 'form-control'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Category::class,
        ));
    }
}