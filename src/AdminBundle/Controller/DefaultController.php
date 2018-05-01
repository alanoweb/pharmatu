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
public function adminProfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('AdminBundle:Admin')->find($id);
        $historique = $em->getRepository('FrontBundle:UserHistorique')->findBy(array('user' => $utilisateur->getUser()),array('date' => 'DESC'));
                
        return $this->render('AdminBundle:Default:monprofil.html.twig', array(
            'user' => $utilisateur,
            'historique' => $historique,
            'config' => 'Default'
            ));
    }
public function userProfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($id);
        $historique = $em->getRepository('FrontBundle:UserHistorique')->findBy(array('user' => $utilisateur->getUser()),array('date' => 'DESC'));
        $inventaire = $em->getRepository('FrontBundle:Inventaire')->findBy(array('utilisateur' => $utilisateur));
        $journal = $em->getRepository('FrontBundle:Journal')->findBy(array('utilisateur' => $utilisateur),array('date' => 'DESC'));
        $levels = $em->getRepository('SupAdminBundle:levels')->findAll();
        $tonextlevel = 0;
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
            'config' => 'Default',
            'tonextlevel' => $tonextlevel,
            'pourcentexperience' => round($pourcentexperience),
            'accountlevel' => $accountlevel,
            ));
    }
    
public function entrepriseProfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->find($id);
        $historique = $em->getRepository('FrontBundle:UserHistorique')->findBy(array('user' => $utilisateur->getUser()),array('date' => 'DESC'));
                
        return $this->render('EntrepriseBundle:Default:monprofil.html.twig', array(
            'user' => $utilisateur,
            'historique' => $historique,
            'config' => 'Default'
            ));
    }
    
    public function activationProfilAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $type = $request->get('type');
        $id = $request->get('id');
        if ($type == 'U'){
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($id);}
        if ($type == 'E'){
        $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->find($id);}
        if ($type == 'D'){
        $utilisateur = $em->getRepository('AdminBundle:Admin')->find($id);}
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
    
    public function EditImgProfilAdminAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photoprofilid');
         $utilisateur = $em->getRepository('AdminBundle:Admin')->find($user);
        $file = $request->files->get('photoprofil');
       if (isset($file)){
           $fileName = md5($user.'photo').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/admin/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImageprofil('img/admin/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
    
    public function EditImgCouvertureAdminAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photocouvertureid');
         $utilisateur = $em->getRepository('AdminBundle:Admin')->find($user);
        $file = $request->files->get('photocouverture');
       if (isset($file)){
           $fileName = md5($user.'couverture').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/admin/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImagecouverture('img/admin/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
    
    public function SaveAdminDataAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('Adminid');
        $utilisateur = $em->getRepository('AdminBundle:Admin')->find($user);

        $utilisateur->setNom($request->get('Adminnom'));
        $utilisateur->setPrenom($request->get('Adminprenom'));
        $utilisateur->setAdresse($request->get('Adminadresse'));
        $utilisateur->setNumero($request->get('Adminnum'));
        $utilisateur->setPseudo($request->get('Adminpseudo'));
        $utilisateur->setCin($request->get('Admincin'));
     
        $em->flush();

        return new Response();
    }
}