<?php


namespace App\Controller;

use App\Services\HealthCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

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




    }