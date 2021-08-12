<?php


namespace App\Controller;

use App\Services\HealthCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ConferenceRepository;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HealthCheckController extends AbstractController
{
    private HealthCheck $healthCheck;
    #[Route('/', name: 'con')]

    public function __construct(HealthCheck $healthCheck)
    {
        $this->healthCheck = $healthCheck;
    }

    public function index(): JsonResponse
    {

        return new JsonResponse($this->healthCheck->getStatus());

    }
    public function index1(): JsonResponse
    {
        return new JsonResponse($this->healthCheck->getName());


    }
    public function index2(Environment $twig, ConferenceRepository $conferenceRepository): Response

    {
               return new Response(<<<EOF
<html>
    <body>
        <img src="/images/under-construction.gif" />
    </body>
</html>
EOF
       );
     return new Response($twig->render('conference/index.html.twig', [
          'conferences' => $conferenceRepository->findAll(),
        ]));


    }}