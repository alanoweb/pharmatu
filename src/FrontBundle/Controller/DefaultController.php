<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Activity;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\Produits;
use FrontBundle\Entity\Utilisateur;
use AdminBundle\Entity\Admin;
use EntrepriseBundle\Entity\Entreprise;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller {

    public function MenuAction() {
        $em = $this->getDoctrine()->getManager();
        $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('FrontBundle:Default:menu.html.twig', array("cathegories" => $cathegories));
    }
    
    public function SlideAction() {
        $em = $this->getDoctrine()->getManager();
        $slides = $em->getRepository('EntrepriseBundle:Pub')->findby(array("type" => "Slide"));
        return $this->render('FrontBundle:includes:slide.html.twig', array("slides" => $slides));
    }
    
    public function PubDroiteAction() {
        $em = $this->getDoctrine()->getManager();
        $PubDroites = $em->getRepository('EntrepriseBundle:Pub')->findby(array("type" => "Droite"));
        return $this->render('FrontBundle:includes:PubDroite.html.twig', array("PubDroites" => $PubDroites));
    }
    
    public function PubGaucheAction() {
        $em = $this->getDoctrine()->getManager();
        $PubGauches = $em->getRepository('EntrepriseBundle:Pub')->findby(array("type" => "Gauche"));
        return $this->render('FrontBundle:includes:PubGauche.html.twig', array("PubGauches" => $PubGauches));
    }

    public function indexAction() {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function aproposAction() {
        return $this->render('FrontBundle:Default:apropos.html.twig');
    }

    public function contactAction() {
        return $this->render('FrontBundle:Default:contact.html.twig');
    }

    public function boutiqueAction() {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('SupAdminBundle:Produits')->findall();
        return $this->render('FrontBundle:Default:boutique.html.twig', array("produits" => $produits));
    }

    public function activityCatAction($id) {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('AdminBundle:ActivityCath')->find($id);
        $activites = $em->getRepository('AdminBundle:Activity')->findby(array('categorie' => $id));
        return $this->render('FrontBundle:Default:catactivity.html.twig', array("activites" => $activites, "categorie" => $categorie));
    }

    public function activityAction($id) {
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository('AdminBundle:Activity')->find($id);
        return $this->render('FrontBundle:Default:activity.html.twig', array("activity" => $activity));
    }
    
    public function monprofilAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_ADMIN')) {
            $utilisateur = $em->getRepository('AdminBundle:Admin')->findOneBy(array('user' => $user));
            return $this->render('AdminBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
        } elseif ($user->hasRole('ROLE_ENTREPRISE')) {
            $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->findOneBy(array('user' => $user));
            return $this->render('EntrepriseBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
        } elseif ($user->hasRole('ROLE_USER')) {
            $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('user' => $user));
            $inventaire = $em->getRepository('FrontBundle:Inventaire')->findBy(array('utilisateur' => $utilisateur));
            $historique = $em->getRepository('FrontBundle:UserHistorique')->findBy(array('utilisateur' => $utilisateur),array('date' => 'DESC'));
            
            return $this->render('FrontBundle:Default:monprofil.html.twig', array(
                'user' => $utilisateur,
                'inventaire' => $inventaire,
                'historique' => $historique,
                    ));
        }
    }
    public function CreatUserProfilAction() {
        $em = $this->getDoctrine()->getManager();
        $userManager = $this->container->get('fos_user.user_manager');
        
        $user = $this->get('security.context')->getToken()->getUser();
        
        if ($user->hasRole('ROLE_ADMIN')) {
            $profil = new Admin();
            $profil->setUser($user);
            
            $em->persist($profil);
            
            $user->setAdmin($profil);
            
            $userManager->updateUser($user);
            $em->flush();
            return new Response($profil->getId());
        } elseif ($user->hasRole('ROLE_ENTREPRISE')) {
            $profil = new Entreprise();
            $profil->setUser($user);
            
            $em->persist($profil);
            
            $user->setEntreprise($profil);
            
            $userManager->updateUser($user);
            $em->flush();
            return new Response($profil->getId());
        } elseif ($user->hasRole('ROLE_USER')) {
            $profil = new Utilisateur();
            $profil->setUser($user);
            $profil->setDate_membre(new \DateTime('now'));
            $profil->setStatus('Actif');
            $em->persist($profil);
            
            $user->setUtilisateur($profil);
            $userManager->updateUser($user);
            
            $em->flush();
            return new Response($profil->getId());
        }
    }
 
     public function SendMessageContactAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        
        $message = \Swift_Message::newInstance()
        ->setSubject($request->get('sujetcontact'))
        ->setFrom($request->get('emailcontact'))
        ->setTo('khannoussi.ayoub.1@gmail.com')
        ->setBody(
            $this->renderView(
                'FrontBundle:email:contact.html.twig',
                array('messagecontact' => $request->get('messagecontact'))
            )
        )
    ;
    $res = $this->get('mailer')->send($message);
        
        return new Response();
    }
 
     public function ChangePWDAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $this->getUser();

            return $response;
    }
    
}

?>