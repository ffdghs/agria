<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Entity\User;
use App\Form\EditprofileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    
    public function showAllUser(): Response
    {
        $allUsers = $this->getDoctrine()->getRepository(User::class)->findAll();


        return $this->render('_backOffice/user/showAllUser.html.twig', [
            'allUsers' => $allUsers
        ]);
    }

   

 /**
    * @Route("/user", name="user")
    */

    public function EditProfile(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);
        $avatar = $this->getDoctrine()->getRepository(Avatar::class)->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profile mis à jour');
            return $this->redirectToRoute('user');
        }

        return $this->render('user/user.html.twig',[
            'form' => $form->createView(),
            'avatar' => $avatar,
        ]);
    }


    /**
     * @Route("/user/edit/pass", name="user_edit_pass")
     */

    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            // On vérifie si les 2 mots de passe sont identiques
            if($request->request->get('pass') == $request->request->get('pass2')){
                $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('pass')));
                $em->flush();
                $this->addFlash('message', 'Mot de passe mis à jour avec succès');

                return $this->redirectToRoute('user');
            }else{
                $this->addFlash('error', 'Les deux mots de passe ne sont pas identiques');
            }
        }

        return $this->render('user/editPass.html.twig');
    }

  
}



