<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

class RegistrationController extends BaseController
{
    public function registerFormAction()
    {
       /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
     
        

        $form = $formFactory->createForm();
       


        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register_content.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}