<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\ConferenceServ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceServController extends AbstractController
{
    #[Route('/conference/serv', name: 'conference_serv')]
    public function dashBoard(): Response
    {
        return $this->render('conference_serv/index.html.twig', [
            'controller_name' => 'ConferenceServController',
        ]);
    }
    private ConferenceServ $conferenceServ;
    #[Route('/', name: 'homepage')]

    public function __construct(ConferenceServ $conferenceServ)
    {
        $this->conferenceServ = $conferenceServ;
    }

    public function statuscserv(): JsonResponse
    {

        return new JsonResponse($this->conferenceServ->getStatusCserv());

    }
}
