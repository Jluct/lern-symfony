<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 22.02.2017
 * Time: 7:56
 */

namespace Ias\GameBundle\Form;


use Ias\GameBundle\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\VarDumper\VarDumper;

class GameListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        VarDumper::dump($options);

        $builder
            ->add('Game', ChoiceType::class, [
                'choices' => [
                    $options['data']
                ],
                'choice_label' => function (Game $game, $key, $index) {
                    /** @var Game $game */
                    return $game->getName();
                },
                'group_by' => function ($category, $key, $index) {

                },
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
//        $resolver->setDefaults([
//            'data_class' => Game::class
//        ]);
    }

}