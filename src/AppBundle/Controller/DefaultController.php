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
            ->add('dueDate', 'date', array('widget' => 'single_text'))
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
