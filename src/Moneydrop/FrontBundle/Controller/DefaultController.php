<?php

namespace Moneydrop\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MoneydropFrontBundle:Default:index.html.twig');
    }

    public function historyAction()
    {
        return $this->render('MoneydropFrontBundle:Default:history.html.twig');
    }

    public function parametersAction()
    {
        return $this->render('MoneydropFrontBundle:Default:parameters.html.twig');
    }

    public function parametersListAction()
    {
        return $this->render('MoneydropFrontBundle:Default:parametersList.html.twig');
    }

    public function successAction()
    {
        return $this->render('MoneydropFrontBundle:Default:success.html.twig');
    }
}
