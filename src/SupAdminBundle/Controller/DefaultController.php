<?php

namespace SupAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SupAdminBundle:Default:index.html.twig');
    }
	public function categoriesAction()
    {
            $em = $this->getDoctrine()->getManager();
            $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('SupAdminBundle:Default:categories.html.twig',array("cathegories"=>$cathegories));
    }
}
