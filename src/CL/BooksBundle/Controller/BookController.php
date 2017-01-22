<?php

namespace CL\BooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BookController extends Controller
{
    /**
     * @Route("/book/showAll")
     */
    public function showAllAction()
    {
        return $this->render('CLBooksBundle:Book:show_all.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("book/create")
     */
    public function createAction()
    {
        return $this->render('CLBooksBundle:Book:create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("book/edit")
     */
    public function editAction()
    {
        return $this->render('CLBooksBundle:Book:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/book/delete/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('CLBooksBundle:Book:delete.html.twig', array(
            // ...
        ));
    }

}
