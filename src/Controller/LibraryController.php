<?php

namespace App\Controller;
use App\Services\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class LibraryController extends AbstractController
{

    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function books(): JsonResponse
    {
        return new JsonResponse($this->bookService->list());
    }
    public function booksOne(string $id): JsonResponse

    {

        return new JsonResponse($this->bookService->findOne($id));

    }

}
