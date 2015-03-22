<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class JobController extends Controller
{
    /**
     * @Route("/jobs", name="jobs")
     */
    public function indexAction()
    {
        return $this->render('jobs/index.html.twig');
    }


    /**
     * @Route("/jobs/create", name="job_create")
     */
    public function createAction()
    {
        return $this->render('jobs/create.html.twig');
    }

}
