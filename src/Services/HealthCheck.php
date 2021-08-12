<?php


namespace App\Services;


class HealthCheck
{
    /**
     * @return string[]
     * getStatus()= devuelve un array con el status ok;
     */
    public function getStatus(): array
    {
        return [
            'status' => 'ok'
        ];
    }
    public function getName(): array
    {
        return [
            'status' => 'Mi nombre es Jose'
        ];
    }
}