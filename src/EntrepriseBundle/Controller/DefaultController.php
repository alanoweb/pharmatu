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
            $em = $this->getDoctrine()->getManager();
        $gagnants = $em->getRepository('EntrepriseBundle:gagnants')->findall();
        return $this->render('EntrepriseBundle:Default:gagnants.html.twig', array("gagnants" => $gagnants));
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
        
        if ($request->get("Importantpub") == "Important"){
         $Pubs = $em->getRepository('EntrepriseBundle:Pub')->findby(array("type" => $request->get("PubType")));
         foreach ($Pubs as $pub1){
             if ($pub1->getImportance() == "Important"){
                 $pub1->setImportance("NoImportant");
             }
         }
         }

        $Pub = new Pub();
        $Pub->setEntreprise($Entreprise);
        $Pub->setType($request->get("PubType"));
        $Pub->setDateDebut(date_create(date('Y-m-d', strtotime($request->get("PubDate_debut")))));
        $Pub->setDateFin(date_create(date('Y-m-d', strtotime($request->get("PubDate_fin")))));
        $Pub->setPrix($request->get("PubPrix"));
        $Pub->setImportance($request->get("Importantpub"));
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
    
     public function DeletePubAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Pub = $em->getRepository('EntrepriseBundle:Pub')->find($id);

        $Pub->setStatus("Deleted");

        $em->persist($Pub);
        $em->flush();

        return new Response();
    }
    
    public function DureePubAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('idPub');
        $Pub = $em->getRepository('EntrepriseBundle:Pub')->find($id);

        $Pub->setDateDebut(date_create(date('Y-m-d', strtotime($request->get("Date_debut")))));
        $Pub->setDateFin(date_create(date('Y-m-d', strtotime($request->get("Date_fin")))));
        $Pub->setStatus("Activer");
              
        $em->flush();

        return new Response();
    }
    
     public function EditPubAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $Entreprise = $em->getRepository('EntrepriseBundle:Entreprise')->find($request->get("EditPubEntreprise"));
        
        if ($request->get("EditImportantpub") == "Important"){
         $Pubs = $em->getRepository('EntrepriseBundle:Pub')->findby(array("type" => $request->get("EditPubType")));
         foreach ($Pubs as $pub1){
             if ($pub1->getImportance() == "Important"){
                 $pub1->setImportance("NoImportant");
             }
         }
         }

        $id = $request->get('EditPubid');
        $Pub = $em->getRepository('EntrepriseBundle:Pub')->find($id);

        $Pub->setEntreprise($Entreprise);
        $Pub->setType($request->get("EditPubType"));
        $Pub->setDateDebut(date_create(date('Y-m-d', strtotime($request->get("EditPubDate_debut")))));
        $Pub->setDateFin(date_create(date('Y-m-d', strtotime($request->get("EditPubDate_fin")))));
        $Pub->setPrix($request->get("EditPubPrix"));
        $Pub->setImportance($request->get("EditImportantpub"));
        $Pub->setStatus("Activer");
        
        $entreprisefoldername = md5($request->get("EditPubEntreprise")).'/';
        $file = $request->files->get('EditPubChemin');
       if (isset($file)){
           $fileName = md5($Pub->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/pub/'.$entreprisefoldername;
           $file->move($photoDir, $fileName);
           $Pub->setChemin('img/pub/'.$entreprisefoldername.$fileName);
       }
        $em->flush();
        return new Response();
    }
    
    public function SaveEntrepriseDataAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('Entrepriseid');
        var_dump($user);
        $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->find($user);

        $utilisateur->setNom($request->get('Entreprisenom'));
        $utilisateur->setAdresse($request->get('Entrepriseadresse'));
        $utilisateur->setTelephone($request->get('Entreprisenumfixe'));
        $utilisateur->setPortable($request->get('Entreprisenumportable'));
        $utilisateur->setFax($request->get('Entreprisenumfax'));
        $utilisateur->setSiteweb($request->get('Entreprisesite'));
        $utilisateur->setDescription($request->get("Entreprisedescription"));
     
        $em->flush();

        return new Response();
    }
    public function EditImgCouvertureEntrepriseAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photocouvertureid');
         $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->find($user);
        $file = $request->files->get('photocouverture');
       if (isset($file)){
           $fileName = md5($user.'couverture').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/entreprise/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImagecouverture('img/entreprise/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
    
    public function EditImgProfilEntrepriseAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photoprofilid');
         $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->find($user);
        $file = $request->files->get('photoprofil');
       if (isset($file)){
           $fileName = md5($user.'photo').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/entreprise/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImageprofil('img/entreprise/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
}
