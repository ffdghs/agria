<?php

namespace App\Controller;

use App\Entity\Badge;
use App\Form\BadgeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BadgeController extends AbstractController
{
    /**
     * @Route("/badge", name="badge")
     */
    public function showAllBadge(): Response
    {
        $allBadges = $this->getDoctrine()->getRepository(Badge::class)->findAll();

        return $this->render('_backOffice/badge/showAllBadge.html.twig', [
            'allBadges' => $allBadges,
        ]);
    }

    public function addBadge(Request $request)
    {
        $badge = new Badge();

        $form = $this->createForm(BadgeType::class,$badge);

        $form->handleRequest($request);

        if(!empty($_FILES['badge'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['badge']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['badge']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/badge/' . $urlPhoto;
                
                move_uploaded_file($_FILES['badge']['tmp_name']['picture'],$dir);
                
            }
        } 

        if($form->isSubmitted() && $form->isValid())
        {
            $badge->setUrlBadge($urlPhoto);

            $em = $this->getDoctrine()->getManager();

            $em->persist($badge);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_badge_showAll'));
        }

        return $this->render('_backOffice/badge/viewBadge.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $badge = $em->getRepository(Badge::class)->find($id);

        $form = $this->createForm(BadgeType::class, $badge);

        $form->handleRequest($request);

        $urlPhoto = '';
        
        if(!empty($_FILES['badge'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['badge']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['badge']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/badge/' . $urlPhoto;
                
                move_uploaded_file($_FILES['badge']['tmp_name']['picture'],$dir);
                
            }
        } 

        if ($form->isSubmitted() && $form->isValid()) {
            if($urlPhoto != '') {
                $badge->setUrlBadge($urlPhoto);
            }

            $em->persist($badge);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_badge_showAll'));
        }

        return $this->render('_backOffice/badge/viewBadge.html.twig', [
            "form" => $form->createView()
        ]);
    }

    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $badge=$em->getRepository(Badge::class)->find($id);

        $em->remove($badge);
        $em->flush();

        return $this->redirect($this->generateUrl('agria_badge_showAll'));
    }
}
