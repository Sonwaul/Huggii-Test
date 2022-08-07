<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Entity\Sujet;
use App\Form\MessageAjoutType;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends AbstractController
{
    /**
     * @Route("/addMessage", name="addMessage")
     */
    public function addMessage(Request $request): Response{
        $em=$this->getDoctrine()->getManager();
        $message= new Message();
        $form = $this->createForm(MessageAjoutType::class, $message);
        $form->handleRequest($request);
        $erreur = "";
        if($form->isSubmitted()&&$form->isValid()){
        	$message = $form->getData();
	        $em=$this->getDoctrine()->getManager();
	        $em->persist($message);
	        $em->flush();
	        return $this->redirectToRoute('listeSujet');
        }
        return $this->render('message/addMessage.html.twig',array(
            'controller_name' => 'Ajouter un message',
            'form' => $form->createView(),
            'erreur' => $erreur,
        ));
    }

     /**
     * @Route("/unSujet/{id}", name="unSujet")
     */
    public function unSujet($id, Request $request): Response
    {
        $em=$this->getDoctrine()->getManager();
        $repository=$this->getDoctrine()->getRepository(Sujet::class);
        $leSujet=$repository->find($id); 
        return $this->render('sujet/detailsujet.html.twig', [
            'sujets' => $leSujet,'controller_name' => 'Visualiser les messages du sujet',
        ]);
    }
}
