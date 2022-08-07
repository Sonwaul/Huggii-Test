<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sujet;
use App\Form\SujetAjoutType;
use Symfony\Component\HttpFoundation\Request;

class SujetController extends AbstractController
{
    /**
     * @Route("/sujet", name="listeSujet")
     */
    public function listeSujet(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Sujet::class);
        $lesSujets=$repository->findAll();
        return $this->render('sujet/index.html.twig', [
            'controller_name' => 'Bienvenue sur la page des Sujets',
            'sujets' => $lesSujets,
        ]);
    }

     /**
     * @Route("/addSujet", name="addSujet")
     */
    public function addSujet(Request $request): Response{
        $em=$this->getDoctrine()->getManager();
        $sujet= new Sujet();
        $form = $this->createForm(SujetAjoutType::class, $sujet);
        $form->handleRequest($request);
        $erreur = "";
        if($form->isSubmitted()&&$form->isValid()){
        	$sujet = $form->getData();
	        $em=$this->getDoctrine()->getManager();
	        $em->persist($sujet);
	        $em->flush();
	        return $this->redirectToRoute('addMessage');
        }
        return $this->render('sujet/addSujet.html.twig',array(
            'controller_name' => 'Ajouter un sujet',
            'form' => $form->createView(),
            'erreur' => $erreur,
        ));
    }
}
