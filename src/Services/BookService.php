<?php

namespace App\Services;


use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;

class BookService
{
    private EntityManager $doctrine;

    /**
     * BookService constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return Array
     */
    public function list(): Array
    {
        /* Getting information */
        $repository = $this->doctrine->getRepository(Book::class);
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

        return $booksResponse;
    }

}