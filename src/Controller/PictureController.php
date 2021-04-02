<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Form\PictureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PictureController extends AbstractController
{

    public function showAllPicture(): Response
    {
        $allPicture = $this->getDoctrine()->getRepository(Picture::class)->findAll();

        return $this->render('_backOffice/picture/showAllPicture.html.twig', [
            'allPicture' => $allPicture
        ]);
    }

    public function addPicture(Request $request)
    {
        $picture = new Picture();

        $form = $this->createForm(PictureType::class,$picture);

        $form->handleRequest($request);

        if(!empty($_FILES['picture']['name']['picture'])) {

            // dd($_FILES);

            $extension = strrchr($_FILES['picture']['name']['picture'],'.');

            $extension = substr($extension,1);

            $extension = strtolower($extension);

            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {

                $urlPhoto = $_FILES['picture']['name']['picture'];

                $dir = __DIR__ . '/../../public/assets/images/picture/' . $urlPhoto;
                
                move_uploaded_file($_FILES['picture']['tmp_name']['picture'],$dir);
            
            }
        } 

        if($form->isSubmitted() && $form->isValid())
        {
            $picture->setUrlPicture($urlPhoto);

            $em = $this->getDoctrine()->getManager();

            $em->persist($picture);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_picture_showAll'));
        }

        return $this->render('_backOffice/picture/viewPicture.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $picture = $em->getRepository(Picture::class)->find($id);

        $form = $this->createForm(PictureType::class, $picture);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($picture);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_picture_showAll'));
        }

        return $this->render('_backOffice/picture/viewPicture.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $picture = $em->getRepository(Picture::class)->find($id);

        $em->remove($picture);
        $em->flush();

        return $this->redirect($this->generateUrl('agria_picture_showAll'));
    }

}
