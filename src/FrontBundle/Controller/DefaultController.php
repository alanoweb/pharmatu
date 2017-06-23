<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function menuAction()
    {
		$em = $this->getDoctrine()->getManager();
		$cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('FrontBundle:Default:menu.html.twig',array("cathegories"=>$cathegories));
    }
      public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }
	 public function aproposAction()
    {
        return $this->render('FrontBundle:Default:apropos.html.twig');
    }
	public function contactAction()
    {
        return $this->render('FrontBundle:Default:contact.html.twig');
    }
	public function boutiqueAction()
    {
		$em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('SupAdminBundle:Produits')->findall();
        return $this->render('FrontBundle:Default:boutique.html.twig',array("produits"=>$produits));
    }
	public function activityCatAction($id)
    {
		$em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository('AdminBundle:Activity')->findby(array('categorie'=>$id));
        return $this->render('FrontBundle:Default:activity.html.twig',array("activites"=>$activites));
    }  
	public function monprofilAction()
    {
    $em= $this->getDoctrine()->getManager();
	$request=$this->get('request');
	$user=$this->get('security.context')->getToken()->getUser();
	if($user->hasRole('ROLE_ADMIN')){
	$utilisateur = $em->getRepository('AdminBundle:Admin')->findOneBy(array('User'=>$user));
	return $this->render('AdminBundle:Default:monprofil.html.twig',array('user'=>$utilisateur));
}
elseif($user->hasRole('ROLE_ENTREPRISE')){
	$utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->findOneBy(array('User'=>$user));
	return $this->render('EntrepriseBundle:Default:monprofil.html.twig',array('user'=>$utilisateur));
}
elseif($user->hasRole('ROLE_USER')){
	$utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('User'=>$user));
	return $this->render('FrontBundle:Default:monprofil.html.twig',array('user'=>$utilisateur));}	
}
}
?>