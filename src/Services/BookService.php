<?php

namespace App\Services;
use App\Transformers\BookTransformer;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;
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
   public function findOne($id): array
    {
        /** @var Book $book */
        $repository = $this->doctrine->getRepository(Book::class);
        return BookTransformer::bookToArray($repository->find($id));
    }
    public function createOne($name,$description): void
    {
        /** @var Book $book */
        $em = $this->getDoctrine()->getManager();
        $em->persist(BookTransformer::arrayToBook($name,$description));
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
    public function deleteBook($id): void
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->doctrine->getRepository(Book::class);
        $book = $repository->find($id);
        $em->remove($book);
        $em->flush();
    }
}