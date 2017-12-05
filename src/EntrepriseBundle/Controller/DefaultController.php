<?php

namespace EntrepriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EntrepriseBundle\Entity\Entreprise;
use EntrepriseBundle\Entity\Pub;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EntrepriseBundle:Default:index.html.twig');
    }
	public function pubAction()
    {
            $em = $this->getDoctrine()->getManager();
        $pubs = $em->getRepository('EntrepriseBundle:Pub')->findall();
        $entreprises = $em->getRepository('EntrepriseBundle:Entreprise')->findall();
            
        return $this->render('EntrepriseBundle:Default:pub.html.twig', array("pubs" => $pubs, "entreprises" => $entreprises));
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
    
     public function AddPubAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $Entreprise = $em->getRepository('EntrepriseBundle:Entreprise')->find($request->get("PubEntreprise"));

        $Pub = new Pub();
        $Pub->setEntreprise($Entreprise);
        $Pub->setType($request->get("PubType"));
        $Pub->setDateDebut(date_create(date('Y-m-d', strtotime($request->get("PubDate_debut")))));
        $Pub->setDateFin(date_create(date('Y-m-d', strtotime($request->get("PubDate_fin")))));
        $Pub->setPrix($request->get("PubPrix"));
        $Pub->setStatus("Nouveau");
         $em->persist($Pub);
        $em->flush();
        $entreprisefoldername = md5($request->get("PubEntreprise")).'/';
        $file = $request->files->get('PubChemin');
       if (isset($file)){
           $fileName = md5($Pub->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/pub/'.$entreprisefoldername;
           $file->move($photoDir, $fileName);
           $Pub->setChemin('img/pub/'.$entreprisefoldername.$fileName);
       }
           
        $em->flush();


        

        

        return new Response();
    }
}
