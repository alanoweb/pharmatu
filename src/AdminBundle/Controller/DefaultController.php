<?php

namespace AdminBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
public function profilsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository('FrontBundle:Utilisateur')->findAll();
        $entreprises = $em->getRepository('EntrepriseBundle:Entreprise')->findAll();
        $admin = $em->getRepository('AdminBundle:Admin')->findAll();
                
        return $this->render('AdminBundle:Default:profils.html.twig', array('utilisateurs' => $utilisateurs,
            'entreprises' => $entreprises, 'admins' => $admin));
    }
public function userProfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($id);
                
        return $this->render('FrontBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
    }
    
    public function activationProfilAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        
        $id = $request->get('id');
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($id);
        if ($utilisateur->getStatus() == "Blocked") {
            $utilisateur->setStatus('Actif');
            $utilisateur->getUser()->setEnabled('1');
        } else {
            $utilisateur->setStatus('Blocked');
            $utilisateur->getUser()->setEnabled('0');
        }
        $em->persist($utilisateur);

        $em->flush();

        return new Response();
    }
}