<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Entity\User;
use App\Entity\Animal;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {


        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $test = $form->getData();

            // dd($test);

            $message = (new \Swift_Message($test['prenom'] . ' a un message'))
            ->setFrom('admin@agria.com')
            ->setTo('freyja.passerelle@gmail.com')
            ->setBody(
                $test['email'] . ': ' .
                $test['message']
            );
            $mailer->send($message);

            return $this->redirect($this->generateUrl('agria_main'));
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function getDatabase() {

        $databaseValues = $this->getDoctrine()->getRepository(Animal::class)->findAll();

        $arrayCollection = array();

        foreach($databaseValues AS $item) {
            $arrayCollection[] = array(
                'name_animal' => $item->getNameAnimal(),
            );
        }
        
        return new JsonResponse($arrayCollection);

    }

    public function getAnimal($name) {
        $animal = $this->getDoctrine()->getRepository(Animal::class)->findOneBy(['name_animal' => $name]);

        $arrayAnimal = array();

        $arrayAnimal[] = $animal->getId();
        $arrayAnimal[] = $animal->getNameAnimal();
        $arrayAnimal[] = $animal->getDietAnimal();
        $arrayAnimal[] = $animal->getStatusAnimal();
        $arrayAnimal[] = $animal->getFamilyAnimal();
        $arrayAnimal[] = $animal->getPopulationAnimal();
        $arrayAnimal[] = $animal->getDescriptionAnimal();
        $arrayAnimal[] = $animal->getNicknameAnimal();
        $arrayAnimal[] = $animal->getMainPictureAnimal();
        $arrayAnimal[] = $animal->getAppearanceAnimal();
        $arrayAnimal[] = $animal->getLegsAnimal();
        $arrayAnimal[] = $animal->getSocialAnimal();
        $arrayAnimal[] = $animal->getCutOutImageAnimal();
        $arrayAnimal[] = $animal->getDescMoreAnimal();
        $arrayAnimal[] = $animal->getPins();
        $arrayAnimal[] = $animal->getHabitats();

        return new JsonResponse($arrayAnimal);
    }

    public function getPins($name) {
        // $pins = $this->getDoctrine()->getRepository(Pin::class)->findBy(['id_animal_pin' => $pin]);
        $pins = $this->getDoctrine()->getRepository(Animal::class)->getContinentForAnimal($name);
        
        // dd($pins);

        // $arrayPin = array();
        $newArray = $pins[0]->getPins();

        dd($newArray);

        foreach($newArray AS $value) {
            $arrayPin[] = $value->getIdRegionPin();
        }

        // foreach($pins AS $value) {
        //     $arrayPin[] = array(
        //         'continent' => $value->getPins(),
        //     );
        // }

        return new JsonResponse($arrayPin);
    }

    public function addFavorite($login_user,$id_animal) {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['login_user' => $login_user]);        
        $animal = $this->getDoctrine()->getRepository(Animal::class)->findOneBy(['id' => $id_animal]);        
        $user->addFavoriteAnimalUser($animal);

        $em = $this->getDoctrine()->getManager();

        $em->persist($user);

        $em->flush();

        return $this->render('index.html.twig');
    }

    public function removeFavorite($login_user,$id_animal) {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['login_user' => $login_user]);        
        $animal = $this->getDoctrine()->getRepository(Animal::class)->findOneBy(['id' => $id_animal]);        
        $user->removeFavoriteAnimalUser($animal);

        $em = $this->getDoctrine()->getManager();

        $em->persist($user);

        $em->flush();

        return $this->render('index.html.twig');
    }

    public function email(\Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('admin@agria.com')
            ->setTo('freyja.passerelle@gmail.com')
            ->setBody(
                'test'
            )
        ;
        $mailer->send($message);
    
        return $this->redirect($this->generateUrl('agria_main'));
    }

}
