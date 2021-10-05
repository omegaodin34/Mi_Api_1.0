<?php
namespace App\Transformers;
use App\Entity\Book;

class BookTransformer
{
    public static function bookToArray($book)
    {
        return['id' => $book->getId(), 'name' => $book->getName(), 'description' => $book->getDescription(),];
    }
    public static function arrayToBook($name,$description)
    {
        $book=new Book();
        $book->setName($name);
        $book->setDescription($description);
        return $book;
    }
}