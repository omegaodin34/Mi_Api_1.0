<?php


namespace App\Controller;

use App\Services\HealthCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController extends AbstractController
{
    private HealthCheck $healthCheck;

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

}