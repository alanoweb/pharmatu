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
use FrontBundle\Entity\Journal;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {
  
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
    public function pharmacyListAction($type = null) {
        $em = $this->getDoctrine()->getManager();
        //$produits = $em->getRepository('SupAdminBundle:Produits')->findall();
        
        if ($type == 'night'){
            return $this->render('FrontBundle:Default:night-pharmacy.html.twig');
        }
        return $this->render('FrontBundle:Default:pharmacy.html.twig');
    }
    
    public function monprofilAction($config) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $historique = $em->getRepository('FrontBundle:UserHistorique')->findBy(array('user' => $user),array('date' => 'DESC'));
        if ($user->hasRole('ROLE_ADMIN')) {
            $utilisateur = $em->getRepository('AdminBundle:Admin')->findOneBy(array('user' => $user));
            return $this->render('AdminBundle:Default:monprofil.html.twig', array(
                'user' => $utilisateur,
                'historique' => $historique,
                'config' => $config,
                ));
        } elseif ($user->hasRole('ROLE_ENTREPRISE')) {
            $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->findOneBy(array('user' => $user));
            return $this->render('EntrepriseBundle:Default:monprofil.html.twig', array(
                'user' => $utilisateur,
                'historique' => $historique,
                'config' => $config,
                    ));
        } elseif ($user->hasRole('ROLE_USER')) {
            $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('user' => $user));
            $levels = $em->getRepository('SupAdminBundle:levels')->findAll();
            $inventaire = $em->getRepository('FrontBundle:Inventaire')->findBy(array('utilisateur' => $utilisateur));
            $journals = $em->getRepository('FrontBundle:Journal')->findBy(array('utilisateur' => $utilisateur),array('date' => 'DESC'));
            $journal = Array();
            foreach( $journals as $key => $elem){
                if($key <3){
                    array_push($journal, $elem);
                }
            }
            $tonextlevel = 0;
            $accountlevel =0;
            foreach ($levels as $level) {
                if ($utilisateur->getExperience() < $level->getExperience())
                {
                    $tonextlevel = $level->getExperience();
                    $accountlevel = $level->getId();
                    break;
                }
            }
            $pourcentexperience = $utilisateur->getExperience()/$level->getExperience()*100;


            return $this->render('FrontBundle:Default:monprofil.html.twig', array(
                'user' => $utilisateur,
                'inventaire' => $inventaire,
                'historique' => $historique,
                'journal' => $journal,
                'config' => $config,
                'tonextlevel' => $tonextlevel,
                'pourcentexperience' => round($pourcentexperience),
                'accountlevel' => $accountlevel,
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
            $profil->setDate_membre(new \DateTime('now'));
            $profil->setStatus('Actif');
            
            $em->persist($profil);
            
            $user->setAdmin($profil);
            
            $userManager->updateUser($user);
            $em->flush();
            return new Response($profil->getId());
        } elseif ($user->hasRole('ROLE_ENTREPRISE')) {
            $profil = new Entreprise();
            $profil->setUser($user);
            $profil->setDate_membre(new \DateTime('now'));
            $profil->setStatus('Actif');
            
            $em->persist($profil);
            
            $user->setEntreprise($profil);
            
            $userManager->updateUser($user);
            $em->flush();
            return new Response($profil->getId());
        } elseif ($user->hasRole('ROLE_USER')) {
            $profil = new Utilisateur();
            $profil->setUser($user);
            $profil->setCoin($this->get('session')->get('Anon_coins'));
            $profil->setExperience($this->get('session')->get('Anon_Exp'));
            $this->get('session')->remove('Anon_Exp');
            $this->get('session')->remove('Anon_coins');
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
}
?>