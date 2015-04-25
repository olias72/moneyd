<?php

namespace Moneydrop\FrontBundle\Controller;

use Moneydrop\FrontBundle\Entity\Theme;
use Moneydrop\FrontBundle\Form\Type\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThemeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $theme = $this
            ->getDoctrine()
            ->getRepository('MoneydropFrontBundle:Theme')
            ->findAll();
        shuffle($theme);
        $theme1 = $theme[0];
        $theme2 = $theme[1];

        return $this->render('MoneydropFrontBundle:Theme:index.html.twig', array('theme1' => $theme1, 'theme2' => $theme2));
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