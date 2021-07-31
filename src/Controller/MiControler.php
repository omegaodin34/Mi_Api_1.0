<?php


namespace App\Controller;


class MiControler extends AbstractController
{
    #[Route('/micontroller', name: 'micontroller')]
    public function index(): Response
    {
        return $this->render('conference/index.html.twig', [
            'controller_name' => 'MiController',
        ]);
    }
}