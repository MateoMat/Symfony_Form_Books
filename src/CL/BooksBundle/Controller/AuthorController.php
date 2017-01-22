<?php

namespace CL\BooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use CL\BooksBundle\Entity\Author;
use CL\BooksBundle\Repository\AuthorRepository;

class AuthorController extends Controller
{
    /**
     * @Route("/author/showAll")
     */
    public function showAllAction()
    {
        $authors=$this->getDoctrine()
                ->getRepository('CLBooksBundle:Author')
                ->findAll();
        
        return $this->render('CLBooksBundle:Author:show_all.html.twig', array(
            'authors'=>$authors
        ));
    }
    
    /**
     * @Route("/author/show/{id}")
     */
    public function showAction($id){
        
        $author=$this->getDoctrine()
                ->getRepository('CLBooksBundle:Author')
                ->findOneById($id);
        
        return $this->render('CLBooksBundle:Author:show.html.twig', array(
            'author'=>$author
        ));
    }

    /**
     * @Route("/author/create",name="CLBook_author_create")
     */
    public function createAction()
    {
        $author=new Author();
        $url=$this->generateUrl('CLBook_author_create');
        $form=$this->createAuthorForm($author, $url);
        
        return $this->render('CLBooksBundle:Author:create.html.twig', array(
            'form'=>$form->createView()
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
    
    private function createAuthorForm(Author $authorObj,$url){
        $form=$this->createFormBuilder($authorObj)
                ->setAction($url)
                ->setMethod('POST')
                ->add('name','text')
                ->add('save','submit',array('label_attr'=>'Zapisz'))
                ->getForm();
        
        return $form;
    }
    
    

    

}
