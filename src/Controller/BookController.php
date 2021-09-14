<?php


namespace App\Controller;


use App\Entity\Book;
use App\Services\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends AbstractController
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

}