<?php

namespace AppBundle\Service;

use AppBundle\Entity\Book;

class BookService
{
    public function create($data = array())
    {
        $book = new Book();

        $book->setTitle($data['title']);
        $book->setDescription($data['description']);
        $book->setPublished($data['published']);
        $book->setMeta($data['meta']);
    }
}