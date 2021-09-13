<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\ConferenceServ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ConferenceServController extends AbstractController
{
    private ConferenceServ $conferenceServ;

    public function __construct(ConferenceServ $conferenceServ)
    {
        $this->conferenceServ = $conferenceServ;
    }

    public function listBook(): JsonResponse
    {

        return new JsonResponse($this->conferenceServ->getListBook());

    }
}
