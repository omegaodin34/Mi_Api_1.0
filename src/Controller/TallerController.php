<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class TallerController extends AbstractController
{
    public function library(): Response
    {
        return $this->render('taller/index.html.twig', [
            'controller_name' => 'TallerController',
        ]);
    }
}
