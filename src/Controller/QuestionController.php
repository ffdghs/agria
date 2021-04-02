<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question", name="question")
     */
    public function showAllQuestion(): Response
    {
        $allQuestions = $this->getDoctrine()->getRepository(Question::class)->findAll();

        return $this->render('_backOffice/question/showAllQuestion.html.twig', [
            'allQuestions' => $allQuestions

        ]);
    }
    public function addQuestion(Request $request)
    {
        $question = new Question();

        $form = $this->createForm(QuestionType::class,$question);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($question);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_question_showAll'));
        }

        return $this->render('_backOffice/question/viewQuestion.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository(Question::class)->find($id);

        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($question);
            $em->flush();

            return $this->redirect($this->generateUrl('agria_question_showAll'));
        }

        return $this->render('_backOffice/question/viewQuestion.html.twig', [
            "form" => $form->createView()
        ]);
    }
    public function delete ($id){
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository(Question::class)->find($id);

        $em->remove($question);
        $em->flush();
        return $this->redirect($this->generateUrl('agria_question_showAll'));

    }


}
