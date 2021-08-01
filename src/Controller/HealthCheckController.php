<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController extends AbstractController
{
    public function index(): JsonResponse
    {
        $response = new JsonResponse([
            'status' => 'ok'
        ]);

        return $response;
    }
}