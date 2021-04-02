<?php

namespace App\Controller;

use App\Entity\Habitat;
use App\Form\HabitatType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HabitatController extends AbstractController
{

    public function showAllHabitat(): Response
    {
        $allHabitats = $this->getDoctrine()->getRepository(Habitat::class)->findAll();
        
        return $this->render('_backOffice/habitat/showAllHabitat.html.twig', [
            'allHabitats' =>  $allHabitats
        ]);
    }

    public function addHabitat(Request $request)
    {
        $habitat = new Habitat();

        $form = $this->createForm(HabitatType::class,$habitat);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($habitat);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_habitat_showAll'));
        }

        return $this->render('_backOffice/habitat/viewHabitat.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $habitat = $em->getRepository(Habitat::class)->find($id);

        $form = $this->createForm(HabitatType::class, $habitat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($habitat);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_habitat_showAll'));
        }

        return $this->render('_backOffice/habitat/viewHabitat.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $habitat = $em->getRepository(Habitat::class)->find($id);

        $em->remove($habitat);
        $em->flush();

        return $this->redirect($this->generateUrl('agria_habitat_showAll'));
    }
}
