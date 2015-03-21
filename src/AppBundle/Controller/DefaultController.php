<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $form = $this->createFormBuilder()
            ->add('task', 'text')
            ->add('description', 'textarea')
            ->add('priority', 'choice', array(
                'choices'  => array('10' => 'High', '5' => 'Normal', '1' => 'Low'),
                'expanded' => false
            ))
            ->add('type', 'choice', array(
                'choices'  => array('task' => 'Task', 'bug' => 'Bug', 'feature' => 'Feature'),
                'expanded' => true
            ))
            ->add('components', 'choice', array(
                'choices'  => array('ui' => 'UI', 'backend' => 'Backend', 'db' => 'Database'),
                'expanded' => true,
                'multiple' => true
            ))
            ->add('dueDate', 'date', array('widget' => 'single_text'))
            ->add('file', 'file')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/_status", name="status")
     */
    public function statusAction()
    {
        return new JsonResponse(array('status' => 'OK'));
    }
}
