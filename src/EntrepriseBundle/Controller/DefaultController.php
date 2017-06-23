<?php

namespace EntrepriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EntrepriseBundle\Entity\Entreprise;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EntrepriseBundle:Default:index.html.twig');
    }
	public function pubAction()
    {
        return $this->render('EntrepriseBundle:Default:pub.html.twig');
    }
	public function gagnantsAction()
    {
        return $this->render('EntrepriseBundle:Default:gagnants.html.twig');
    }
	public function statistiqueAction()
    {
        return $this->render('EntrepriseBundle:Default:statistique.html.twig');
    }
	public function enregistrerprofilAction()
    {
		$em = $this->container->get('doctrine')->getManager();
		$request = $this->container->get('request');
		
		$nom= $request->get('nom');
		$adresse= $request->get('adresse');
		$telephone= $request->get('telephone');
		$portable= $request->get('portable');
		$fax= $request->get('fax');
		$siteweb= $request->get('siteweb');
		
		$user=$this->get('security.context')->getToken()->getUser();
        $Entreprise = $em->getRepository('EntrepriseBundle:Entreprise')->findOneBy(array('User'=>$user));
		
		if(!$Entreprise){
			$Entreprise = new Entreprise();
			$Entreprise->setUser($user);
		}
		$Entreprise->setNom($nom);
		$Entreprise->setAdresse($adresse);
		$Entreprise->setTelephone($telephone);
		$Entreprise->setPortable($portable);
		$Entreprise->setFax($fax);
		$Entreprise->setSiteweb($siteweb);
		
		$em->persist($Entreprise);
		$em->flush();

        return new response('ok');
    }
}
