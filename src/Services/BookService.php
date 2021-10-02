<?php

namespace App\Services;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @method getDoctrine()
 */
class BookService extends AbstractController
{
    private EntityManagerInterface $doctrine;
    /**
     * BookService constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    /**
     * @return array
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
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'description' => "mixed"])] public function findOne($id): array
    {
        /** @var Book $book */
        $repository = $this->doctrine->getRepository(Book::class);
        $book = $repository->find($id);
        return ['id' => $book->getId(), 'name' => $book->getName(), 'description' => $book->getDescription(),];
    }
    public function createOne($name,$description): void
    {
        $em = $this->getDoctrine()->getManager();
        $book = new Book();
        $book->setName($name);
        $book->setDescription($description);
        $em->persist($book);
        $em->flush();
    }
    public function patchBook($id,$name,$description): void
    {
        /** @var Book $book */
        $em = $this->getDoctrine()->getManager();
        $repository = $this->doctrine->getRepository(Book::class);
        $book = $repository->find($id);
        $book->setName($name);
        $book->setDescription($description);
        $em->flush();
    }
}