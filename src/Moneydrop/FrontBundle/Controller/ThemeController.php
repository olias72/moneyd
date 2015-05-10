<?php

namespace Moneydrop\FrontBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Moneydrop\FrontBundle\Entity\Theme;
use Moneydrop\FrontBundle\Entity\ThemeRepository;
use Moneydrop\FrontBundle\Form\Type\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThemeController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        //$repository = $this->getDoctrine()->getRepository('MoneydropFrontBundle:Theme');
        //$theme1 = $repository->randomOne();
        //$theme2 = $repository->randomOne();
        //$id = rand(1, $this->count());
        //$theme = $this
        //->getDoctrine()
        //->getRepository('MoneydropFrontBundle:Theme')
        //->findByName();
        ////shuffle($theme);
        //$theme1 = $theme->getName();
        //$theme2 = $theme[1]->getName();

        //$form = $this->createFormBuilder()
        //    ->add('theme', 'choice', array('choices' => array('theme1' => $theme1, 'theme2' => $theme2, 'expanded' => true))
        //    ->add('valider', 'submit')
        //    ->getForm();

        //$repository = $this->getDoctrine()->getRepository('MoneydropFrontBundle:Theme');

        $form = $this->createFormBuilder()
            ->add('theme', 'entity', array(
                'class' => 'MoneydropFrontBundle:Theme',
                'property' => 'name',
                'expanded' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->where('t.id = :id1')
                        //->orWhere('t.id = :id2')
                        ->setParameters(array('id1' => rand(1, 8)));//, 'id2' => rand(1, 8)));
                }))
            ->add('submit', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid())
        {
            $data = $form['theme']->getData()->getName();
            return $this->redirect($this->generateUrl('moneydrop_front_game_question', array('data' => $data)));
        }
        return $this->render('MoneydropFrontBundle:Theme:index.html.twig', array('form' => $form->createView()));
    }

    public function addAction(Request $request)
    {
        $theme = new Theme();
        $form = $this->createForm(new ThemeType(), $theme);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($theme);
            $em->flush();

            return $this->redirect($this->generateUrl('moneydrop_front_list_theme'));
        }
        return $this->render('MoneydropFrontBundle:Theme:add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $theme = $this
            ->getDoctrine()
            ->getRepository('MoneydropFrontBundle:Theme');

        $themes = $theme->findAll();

        return $this->render('MoneydropFrontBundle:Theme:list.html.twig', array('themes' => $themes));
    }
}