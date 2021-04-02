<?php

namespace App\Controller;

use App\Entity\Trophy;
use App\Form\TrophyType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrophyController extends AbstractController
{
    public function showAllTrophy(): Response
    {
        $allTrophies = $this->getDoctrine()->getRepository(Trophy::class)->findAll();

        return $this->render('_backOffice/trophy/showAllTrophy.html.twig', [
            'allTrophies' => $allTrophies
        ]);
    }

/*     public function addTrophy()
    {
        $trophy = new Trophy();
        $form = $this->createForm(TrophyType::class,$trophy);

        return $this->render('_backOffice/trophy/addTrophy.html.twig', [
            'form' => $form->createView()
        ]);
    } */

    public function addTrophy(Request $request)
    {
        $trophy = new Trophy();

        $form = $this->createForm(TrophyType::class,$trophy);

        $form->handleRequest($request);

        if(!empty($_FILES['trophy'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['trophy']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['trophy']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/trophy/' . $urlPhoto;
                
                move_uploaded_file($_FILES['trophy']['tmp_name']['picture'],$dir);
                
            }
        } 

        if($form->isSubmitted() && $form->isValid())
        {
            $trophy->setUrlTrophy($urlPhoto);

            $em = $this->getDoctrine()->getManager();

            $em->persist($trophy);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_trophy_showAll'));
        }

        return $this->render('_backOffice/trophy/viewTrophy.html.twig', [
            'form' => $form->createView()
        ]);
    }
    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $trophy = $em->getRepository(Trophy::class)->find($id);

        $form = $this->createForm(TrophyType::class, $trophy);

        $form->handleRequest($request);

        $urlPhoto = '';

        if(!empty($_FILES['trophy'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['trophy']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['trophy']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/trophy/' . $urlPhoto;
                
                move_uploaded_file($_FILES['trophy']['tmp_name']['picture'],$dir);
                
            }
        } 

        if ($form->isSubmitted() && $form->isValid()) {
            if($urlPhoto != '') {
                $trophy->setUrlAvatar($urlPhoto);
            }
            $em->persist($trophy);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_trophy_showAll'));
        }

        return $this->render('_backOffice/trophy/viewTrophy.html.twig', [
            "form" => $form->createView()
        ]);
    }
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $trophy = $em->getRepository(Trophy::class)->find($id);

        $em->remove($trophy);
        $em->flush();

        return $this->redirect($this->generateUrl('agria_trophy_showAll'));
    }
    
}
