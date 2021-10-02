<?php

namespace App\Controller;
use App\Services\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


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
    public function booksOne(int $id): JsonResponse
    {
        return new JsonResponse($this->bookService->findOne($id));
    }
    public function createBook(Request $request): JsonResponse
    {
        $name = $request->get('name');
        $description = $request->get('description');
        return new JsonResponse($this->bookService->createOne($name,$description));
    }
}
