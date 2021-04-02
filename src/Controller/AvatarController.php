<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Form\AvatarType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvatarController extends AbstractController
{
    /**
     * @Route("/avatar", name="avatar")
     */
/*     public function index(): Response
    {
        return $this->render('avatar/avatar.html.twig', [
            'avatar' => 'AvatarController',
        ]);
    } */

    public function showAllAvatar(): Response
    {
        $allAvatars = $this->getDoctrine()->getRepository(Avatar::class)->findAll();

        return $this->render('_backOffice/avatar/showAllAvatar.html.twig', [
            'allAvatars' => $allAvatars
        ]);
    }

    public function addAvatar(Request $request)
    {
        $avatar = new Avatar();

        $form = $this->createForm(AvatarType::class,$avatar);

        $form->handleRequest($request);

        if(!empty($_FILES['avatar'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['avatar']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['avatar']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/avatar/' . $urlPhoto;
                
                move_uploaded_file($_FILES['avatar']['tmp_name']['picture'],$dir);
                
            }
        } 

        if($form->isSubmitted() && $form->isValid())
        {
            $avatar->setUrlAvatar($urlPhoto);

            $em = $this->getDoctrine()->getManager();

            $em->persist($avatar);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_avatar_showAll'));
        }

        return $this->render('_backOffice/avatar/viewAvatar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request){

        $em = $this->getDoctrine()->getManager();

        $avatar = $em->getRepository(Avatar::class)->find($id);

        $form = $this->createForm(AvatarType::class, $avatar);

        $form->handleRequest($request);

        $urlPhoto = '';

        if(!empty($_FILES['avatar'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['avatar']['name']['picture'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['avatar']['name']['picture'];
                
                $dir = __DIR__ . '/../../public/assets/images/avatar/' . $urlPhoto;
                
                move_uploaded_file($_FILES['avatar']['tmp_name']['picture'],$dir);
                
            }
        } 
        
        if($form->isSubmitted() && $form->isValid()){
            if($urlPhoto != '') {
                $avatar->setUrlAvatar($urlPhoto);
            }
        
            $em->persist($avatar);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_avatar_showAll'));
        }
        return $this->render('_backOffice/avatar/viewAvatar.html.twig',[

            "form"=> $form->createView()
        ]);
    }

    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $avatar = $em->getRepository(Avatar::class)->find($id);

        $em->remove($avatar);
        $em->flush();

        return $this->redirect($this->generateUrl('agria_avatar_showAll'));
    }
}