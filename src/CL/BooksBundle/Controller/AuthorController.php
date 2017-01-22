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
     * @Route("/author/showAll",name="CLBook_author_showAll")
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
    public function createAction(Request $req)
    {
        $author=new Author();
        $url=$this->generateUrl('CLBook_author_create');
        $form=$this->createAuthorForm($author, $url);
        
        $form->handleRequest($req);
        if($form->isSubmitted()){
            $author=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
            
            return $this->redirect($this->generateUrl('CLBook_author_showAll'));
        }
        
        return $this->render('CLBooksBundle:Author:create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/author/edit/{id}",name="CLBook_author_edit")
     */
    public function editAction(Request $req,$id)
    {
        
        $author=$this->getDoctrine()
                ->getRepository('CLBooksBundle:Author')
                ->findOneById($id);
                
        $url=$this->generateUrl('CLBook_author_edit',array('id'=>$id));
        $form=$this->createAuthorForm($author, $url);
        
        $form->handleRequest($req);
        
        if($form->isSubmitted()){
            
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            
            return $this->redirect($this->generateUrl('CLBook_author_showAll'));
        }
        
        return $this->render('CLBooksBundle:Author:create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/author/delete/{id}")
     */
    public function deleteAction($id)
    {
        
        $author=$this->getDoctrine()->getRepository('CLBooksBundle:Author')->findOneById($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($author);
        $em->flush();
        
        
        return $this->redirect($this->generateUrl('CLBook_author_showAll'));
        
    }
    
    private function createAuthorForm(Author $authorObj,$url){
        $form=$this->createFormBuilder($authorObj)
                ->setAction($url)
                ->setMethod('POST')
                ->add('name','text')
                ->add('save','submit',array('label'=>'Zapisz'))
                ->getForm();
        
        return $form;
    }
    
    

    

}
