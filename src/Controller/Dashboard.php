<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/dashboard", name="dashboard_", options={"expose"=true});
 */
final class Dashboard extends AbstractController
{
    /**
     * @Route("indedx", name="index", options={"expose"=true});
     */
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }

}