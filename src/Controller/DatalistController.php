<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatalistController extends AbstractController
{
    /**
     * @Route("/datalist", name="datalist")
     */
    public function index(): Response
    {
        return $this->render('datalist/index.html.twig', [
            'controller_name' => 'DatalistController',
        ]);
    }

}
