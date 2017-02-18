<?php

namespace Ias\GameBundle\Controller;

use Ias\GameBundle\Entity\Task;
use Ias\GameBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $games = $this->getDoctrine()->getRepository('IasGameBundle:Game')->findAll();
//        var_dump($games[0]);die;

        return $this->render('IasGameBundle:Default:index.html.twig', ['games' => $games]);
    }

    public function getGameAction()
    {
        $game_session = $this->getDoctrine()->getRepository('IasGameBundle:Game')->getActiveGameSession();

//        var_dump($game_session);die;

        return $this->render('IasGameBundle:Default:game.html.twig', ['game_session' => $game_session]);

    }

    public function exampleAction(Request $request)
    {
        $task = new Task();

        $task->setTask('Example 1');
        $task->setDueDate(new \DateTime('tomorrow'));
        $task->setDescription('');

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
