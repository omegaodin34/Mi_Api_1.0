<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 *
 * @ORM\Entity()
 * @ORM\Table(name="books")
 *
 * @package App\Entity
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     *
     * @var string
     */
    private $description;

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string $id
     * @return Book
     */
    public function setId(string $id): Book
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Book
     */
    public function setName(string $name): Book
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Book
     */
    public function setDescription(string $description): Book
    {
        $this->description = $description;
        return $this;
    }
}