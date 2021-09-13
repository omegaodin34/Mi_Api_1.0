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
}