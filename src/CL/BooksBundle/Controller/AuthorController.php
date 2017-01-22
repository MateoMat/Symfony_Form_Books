<?php

namespace CL\BooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AuthorController extends Controller
{
    /**
     * @Route("/author/showAll")
     */
    public function showAllAction()
    {
        return $this->render('CLBooksBundle:Author:show_all.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/author/create")
     */
    public function createAction()
    {
        return $this->render('CLBooksBundle:Author:create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/author/edit/{id}")
     */
    public function editAction($id)
    {
        return $this->render('CLBooksBundle:Author:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/author/delete/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('CLBooksBundle:Author:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/author/show/{id}")
     */
    public function showAction($id)
    {
        return $this->render('CLBooksBundle:Author:show.html.twig', array(
            // ...
        ));
    }

}
