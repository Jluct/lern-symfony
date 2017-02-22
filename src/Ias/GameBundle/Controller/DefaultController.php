<?php

namespace Ias\GameBundle\Controller;

use Ias\GameBundle\Entity\Task;
use Ias\GameBundle\Form\GameListType;
use Ias\GameBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ias\GameBundle\Entity\Tag;
use Ias\GameBundle\Entity\Game;

use Symfony\Component\VarDumper\VarDumper;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $games = $this->getDoctrine()->getRepository('IasGameBundle:Game')->findAll();

        return $this->render('IasGameBundle:Default:index.html.twig', ['games' => $games]);
    }

    public function getGameAction()
    {

        $game_repository = $this->getDoctrine()->getRepository('IasGameBundle:Game');
        $game_session = $game_repository->getActiveGameSession();

        $game = $game_repository->getAllGameInBase();
//        VarDumper::dump($game);

        $gameForm = $this->createForm(GameListType::class,$game);

        return $this->render('IasGameBundle:Default:game.html.twig', ['game_session' => $game_session,'gameForm'=>$gameForm->createView()]);

    }

    public function exampleAction(Request $request)
    {
        $task = new Task();

        $task->setTask('Example 1');
        $task->setDueDate(new \DateTime('tomorrow'));
        $task->setDescription('');

        $tag1 = new Tag();
        $tag1->setName('tag1');
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setName('tag2');
        $task->getTags()->add($tag2);

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            var_dump($task);
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            //return $this->redirectToRoute('task_success');
        }

        return $this->render("IasGameBundle:example:test.html.twig", ['form' => $form->createView()]);
    }
}
