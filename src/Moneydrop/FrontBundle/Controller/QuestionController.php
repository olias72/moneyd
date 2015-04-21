<?php

namespace Moneydrop\FrontBundle\Controller;

use Moneydrop\FrontBundle\Entity\Question;
use Moneydrop\FrontBundle\Form\Type\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{
    public function addAction(Request $request)
    {
        $question = new Question();
        $form = $this->createForm(new QuestionType(), $question);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirect($this->generateUrl('moneydrop_front_list_question'));
        }

        return $this->render('MoneydropFrontBundle:Question:add.html.twig', array('form' => $form->createView()));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoneydropFrontBundle:Question');
        $question = $repository->find($id);

        $em->remove($question);
        $em->flush();

        $questions = $repository->findAll();
        return $this->render('MoneydropFrontBundle:Question:list.html.twig', array('questions' => $questions));
    }

    public function listAction()
    {
        $question = $this
            ->getDoctrine()
            ->getRepository('MoneydropFrontBundle:Question');
        $questions = $question->findAll();

        return $this->render('MoneydropFrontBundle:Question:list.html.twig', array('questions' => $questions));
    }
}