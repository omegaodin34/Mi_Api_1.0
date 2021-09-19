<?php


namespace App\Controller;

use App\Services\HealthCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController extends AbstractController
{
    private HealthCheck $healthCheck;

    public function __construct(HealthCheck $healthChecking)
    {
        $this->healthCheck = $healthChecking;
    }
    public function index(): JsonResponse
    {
        return new JsonResponse($this->healthCheck->getStatus());
    }
}