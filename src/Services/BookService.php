<?php

namespace App\Services;

use Doctrine\ORM\EntityManager;
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

        $repository = $this->doctrine->getRepository(Book::class);
        $books = $repository->findAll();
        $booksResponse = [];
        $numberOfRegister= 2;
        foreach ($books as $book) {
            /** @var Book $book */
            $booksResponse[$numberOfRegister] = [
                'id' => $book->getId(),
                'name' => $book->getName(),
                'description' => $book->getDescription(),
            ];
        }

        return $booksResponse;

    }

}