<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Form\PinType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinController extends AbstractController
{   
    public function showAllPin(): Response
    {
        $allPins = $this->getDoctrine()->getRepository(Pin::class)->findAll();

        return $this->render('_backOffice/pin/showAllPin.html.twig', [
            'allPins' => $allPins
        ]);
    }
    
    public function addPin(Request $request)
    {
        $pin = new Pin();

        $form = $this->createForm(PinType::class,$pin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($pin);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_pin_showAll'));
        }

        return $this->render('_backOffice/pin/viewPin.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pin = $em->getRepository(Pin::class)->find($id);

        $form = $this->createForm(PinType::class, $pin);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($pin);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_pin_showAll'));
        }

        return $this->render('_backOffice/pin/viewPin.html.twig', [
            "form" => $form->createView()
        ]);
    }
    public function delete ($id){
        $em = $this->getDoctrine()->getManager();
        $pin = $em->getRepository(Pin::class)->find($id);

        $em->remove($pin);
        $em->flush();
        return $this->redirect($this->generateUrl('agria_pin_showAll'));

    }
}
