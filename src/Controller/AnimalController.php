<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Form\AnimalType;
use App\Entity\Continent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    public function showAllAnimal(): Response
    {
        $allAnimals = $this->getDoctrine()->getRepository(Animal::class)->findAll();

        return $this->render('_backOffice/animal/showAllAnimal.html.twig', [
            'allAnimals' => $allAnimals
        ]);
    }

    public function addAnimal(Request $request)
    {
        $animal = new Animal();

        $form = $this->createForm(AnimalType::class,$animal);

        $form->handleRequest($request);

        // $urlPhoto ='';

        if(!empty($_FILES['animal'])) {

            // dd($_FILES);
            
            $extension = strrchr($_FILES['animal']['name']['main_picture_animal'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['animal']['name']['main_picture_animal'];
                
                $dir = __DIR__ . '/../../public/assets/images/animal/' . $urlPhoto;
                
                move_uploaded_file($_FILES['animal']['tmp_name']['main_picture_animal'],$dir);
                
            }
        } 
        
        if($form->isSubmitted() && $form->isValid())
        {
            $animal->setMainPictureAnimal($urlPhoto);

            $em = $this->getDoctrine()->getManager();

            $em->persist($animal);

            $em->flush();
            
            return $this->redirect($this->generateUrl('agria_animal_showAll'));
            //dd($animal);
        }

        return $this->render('_backOffice/animal/viewAnimal.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
    public function update($id, Request $request){
        
        $em = $this->getDoctrine()->getManager();

        $animal = $em->getRepository(Animal::class)->find($id);

        $form = $this->createForm(AnimalType::class, $animal);
        
        $form->handleRequest($request);
        
        $urlPhoto = '';
        
        if(!empty($_FILES['animal']['name']['cut_out_image_animal'])) {
            
            // dd($_FILES);
            
            $extension2 = strrchr($_FILES['animal']['name']['cut_out_image_animal'],'.');
            
            $extension2 = substr($extension2,1);
            
            $extension2 = strtolower($extension2);
            
            $extension2Valide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension2,$extension2Valide)) {
                
                $urlPhoto2 = $_FILES['animal']['name']['cut_out_image_animal'];
                
                $dir = __DIR__ . '/../../public/assets/images/animal/cutOuts/' . $urlPhoto2;
                
                move_uploaded_file($_FILES['animal']['tmp_name']['cut_out_image_animal'],$dir);
                
            }
        } 
        
        if(!empty($_FILES['animal']['name']['main_picture_animal'])) {
            
            // dd($_FILES);
            
            $extension = strrchr($_FILES['animal']['name']['main_picture_animal'],'.');
            
            $extension = substr($extension,1);
            
            $extension = strtolower($extension);
            
            $extensionValide = array('jpg','jpeg','webp','png','gif');
            
            if(in_array($extension,$extensionValide)) {
                
                $urlPhoto = $_FILES['animal']['name']['main_picture_animal'];
                
                $dir = __DIR__ . '/../../public/assets/images/animal/' . $urlPhoto;
                
                move_uploaded_file($_FILES['animal']['tmp_name']['main_picture_animal'],$dir);
                
            }
        } 
        
        if($form->isSubmitted() && $form->isValid()){
            if($urlPhoto != '') {
                $animal->setMainPictureAnimal($urlPhoto);
            }
            if($urlPhoto2 != '') {
                $animal->setCutOutImageAnimal($urlPhoto2);
            }
            
            $em->persist($animal);
            $em->flush();
            
            return $this->redirect($this->generateUrl('agria_animal_showAll'));
        }
        return $this->render('_backOffice/animal/viewAnimal.html.twig',[
            
            "form"=> $form->createView()
            ]);
    }
    
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $animal = $em->getRepository(Animal::class)->find($id);
        
        $em->remove($animal);
        $em->flush();
        
        return $this->redirect($this->generateUrl('agria_animal_showAll'));
    }
    
    public function frontAllAnimals(): Response
    {
        $allAnimals = $this->getDoctrine()->getRepository(Animal::class)->findAll();

        $habitats = $this->getDoctrine()->getRepository(Habitat::class)->findAll();

        $continents = $this->getDoctrine()->getRepository(Continent::class)->findAll();
    
        return $this->render('/animal/animal.html.twig', [
            'animals' => $allAnimals,
            'habitats' => $habitats,
            'continents' => $continents
        ]);
    }

    public function frontAnimalsByHabitat($name): Response
    {
        $animalsByHabitat = $this->getDoctrine()->getRepository(Animal::class)->findAnimalByHabitat($name);

        $habitats = $this->getDoctrine()->getRepository(Habitat::class)->findAll();

        $continents = $this->getDoctrine()->getRepository(Continent::class)->findAll();
    
        return $this->render('/animal/animal.html.twig', [
            'animals' => $animalsByHabitat,
            'habitats' => $habitats,
            'continents' => $continents
        ]);
    }
    public function frontAnimalsByContinent($id): Response
    {
        $animalsByContinent = $this->getDoctrine()->getRepository(Animal::class)->findAnimalByContinent($id);

        $habitats = $this->getDoctrine()->getRepository(Habitat::class)->findAll();

        $continents = $this->getDoctrine()->getRepository(Continent::class)->findAll();
    
        return $this->render('/animal/animal.html.twig', [
            'animals' => $animalsByContinent,
            'habitats' => $habitats,
            'continents' => $continents
        ]);
    }

    public function getDatabase() {

        $databaseValues = $this->getDoctrine()->getRepository(Animal::class)->findAll();

        $nameAnimals = [];

        foreach($databaseValues AS $value) {
            array_push($nameAnimals, $value);
        }

        return new JsonResponse($nameAnimals);
    }

    public function details() {

        return $this->render('/animal/animal.details.html.twig');
    }

    public function getDiet($diet) {
        $dietAnimals = $this->getDoctrine()->getRepository(Animal::class)->findBy(['diet_animal' => $diet]);

        return $this->render('/animal/animal.html.twig', [
            'animals' => $dietAnimals
        ]);
    }
    public function getType($type) {
        $typeAnimals = $this->getDoctrine()->getRepository(Animal::class)->findBy(['family_animal' => $type]);

        return $this->render('/animal/animal.html.twig', [
            'animals' => $typeAnimals
        ]);
    }
}
