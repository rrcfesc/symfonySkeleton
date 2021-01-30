<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/", name="welcome_", options={"expose"=true})
 */
final class GuestController extends AbstractController
{

    /**
     * @Route("", name="index");
     */
    public function index(): Response
    {
        return $this->render('guest/index.html.twig');
    }
}