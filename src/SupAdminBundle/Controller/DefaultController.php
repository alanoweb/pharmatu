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
        return $this->render('SupAdminBundle:Default:categories.html.twig');
    }
}
