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

    public function MenuAction() {
        $em = $this->getDoctrine()->getManager();
        $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('FrontBundle:includes:menu.html.twig', array("cathegories" => $cathegories));
    }
    
    public function NotificationAction() {
        $em = $this->getDoctrine()->getManager();
        $notification = $em->getRepository('FrontBundle:Notification')->findby(array("status" => "nouveau","user" => $this->getUser()));
        return $this->render('FrontBundle:includes:notification.html.twig', array("notification" => $notification,"nombreofnew"=>count($notification)));
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
    
    public function BodyAction() {
        $em = $this->getDoctrine()->getManager();
        $Actualites = $em->getRepository('FrontBundle:Actualite')->findAll(array('date' => 'DESC'));
        return $this->render('FrontBundle:includes:Body.html.twig', array("Actualites" => $Actualites));
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

    public function classementAction() {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('SupAdminBundle:Produits')->findall();
        return $this->render('FrontBundle:Default:classement.html.twig', array("produits" => $produits));
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
        return $this->render($activity->getChemin(), array("activity" => $activity));
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
 
    public function ChangePWDAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $this->getUser();
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        
        $currentpwd = $encoder->encodePassword($request->get('changepasswordcurrent'), $user->getSalt());
        $password = $request->get('changepasswordnew1');
        $passwordrepeat = $request->get('changepasswordnew2');
        if ($user->getPassword() !== $currentpwd){
            return new Response('Mot de passe actuel invalide');
        }
        if ($password !== $passwordrepeat || !$password || !$passwordrepeat){
            return new Response('les deux mots de passe ne sont pas identique ou vide');
        }
        $user->setPassword($encoder->encodePassword($password, $user->getSalt()));

        $em->flush();
        return new Response('mot de passe modifier avec succee');
    }
 
    public function PosteJournalAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('formpostjournalid');
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($user);
        
        $poste = new Journal();
        $poste->setDescription($request->get('formpostjournaldescription'));
        $poste->setTitle($request->get('formpostjournaltitle'));
        $poste->setDate(new \DateTime('now'));
        $poste->setUtilisateur($utilisateur);
        
        $em->persist($poste);
        $em->flush();
        $file = $request->files->get('formpostjournalimage');
       if (isset($file)){
           $fileName = md5($poste->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/journal/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $poste->setImage('img/journal/'.md5($user).'/'.$fileName);
       } 
        $em->flush();

        return new Response();
    }
    
    public function journalShowMoreAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $journals = $em->getRepository('FrontBundle:Journal')->findBy(array('utilisateur' => $utilisateur),array('date' => 'DESC'));
        $journal = Array();
        foreach( $journals as $key => $elem){
            if($key <3){
                array_push($journal, $elem);
            }
        }

        return new Response();
    }
    
    public function notificationsListAction() {
        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository('FrontBundle:Notification')->findby(array("user" => $this->getUser()));
        $notif = array();
        foreach($notifications as $notification){
            $notiftarget = array();
            switch ($notification->getType()) {
                case 'discussion':
                    $notiftarget['icon'] = "fa-comments";
                    $notiftargetobject = $em->getRepository('UserBundle:User')->find($notification->getTarget());
                    $notiftarget['img'] = $notiftargetobject->getAdmin()->getImageprofil();
                    $notiftarget['name'] = $notiftargetobject->getUsername();
                    $notiftarget['type'] = 'administrateur';
                    $notiftarget['date'] = new \DateTime();
                    break;
                case 'activity':
                    $notiftarget['icon'] = "fa-gamepad";
                    $notiftargetobject = $em->getRepository('AdminBundle:Activity')->find($notification->getTarget());
                    $notiftarget['img'] = $notiftargetobject->getImg();
                    $notiftarget['name'] = $notiftargetobject->getNom();
                    $notiftarget['type'] = 'Activité';
                    $notiftarget['date'] = $notiftargetobject->getdat_deb();
                    break;
                case 'video':
                    $notiftarget['icon'] = "fa-film";
                    $notiftargetobject = $em->getRepository('AdminBundle:Activity')->find($notification->getTarget());
                    $notiftarget['img'] = $notiftargetobject->getImg();
                    $notiftarget['name'] = $notiftargetobject->getNom();
                    $notiftarget['type'] = 'Video';
                    $notiftarget['date'] = $notiftargetobject->getdat_deb();
                    break;
            }
            $notif[$notification->getId()] = $notiftarget;
        }
        
        return $this->render('FrontBundle:Default:notifications.html.twig', array(
            "notifications" => $notifications,
            'notiftarget' => $notif,
                ));
    }
    
    public function notificationRedirectAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        
        $notification = $em->getRepository('FrontBundle:Notification')->find($request->get('id'));
        
        $notification->setStatus('vue');
        $em->flush();
        
        switch ($notification->getType()) {
            case 'discussion':
                $notiftargetobject = $em->getRepository('UserBundle:User')->find($notification->getTarget());
                
                break;
            case 'activity':
                return new JsonResponse($this->generateUrl('actsingle', array('id' => $notification->getTarget())));
                break;
            case 'video':
                return new JsonResponse($this->generateUrl('actsingle', array('id' => $notification->getTarget())));
                break;
        }
        
        return new Response('ok');
    }

}

?>