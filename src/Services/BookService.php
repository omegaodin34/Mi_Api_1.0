<?php


namespace App\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Book;


class BookService extends AbstractController
{
    public function list(): Array
    {

        /*Getting information */
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Book::class);
        $books = $repository->findAll();
        /* Response preparations */
        $booksResponse = [];
        foreach ($books as $book) {
            /** @var Book $book */
            $booksResponse[] = [
                'id' => $book->getId(),
                'name' => $book->getName(),
                'description' => $book->getDescription(),
            ];
        }

        return [$booksResponse];
    }

}