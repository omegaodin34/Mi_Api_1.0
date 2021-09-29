<?php

namespace App\Services;

use App\Form\LibraryFormType;
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
    public function list(): array
    {
        /** @var Book $book */
        $repository = $this->doctrine->getRepository(Book::class);
        $books = $repository->findAll();
        $booksResponse = [];
        foreach ($books as $book) {
            $booksResponse[] = [
                'id' => $book->getId(),
                'name' => $book->getName(),
                'description' => $book->getDescription(),
            ];
        }

        return $booksResponse;
    }

    /**
     * @param $id
     * @return array
     */
    public function findOne($id): array
    {
        /** @var Book $book */
        $repository = $this->doctrine->getRepository(Book::class);
        $book = $repository->find($id);
        return ['id' => $book->getId(), 'name' => $book->getName(), 'description' => $book->getDescription(),];
    }
}