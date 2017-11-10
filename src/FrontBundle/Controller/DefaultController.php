<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Activity;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\Produits;

class DefaultController extends Controller {

    public function menuAction() {
        $em = $this->getDoctrine()->getManager();
        $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('FrontBundle:Default:menu.html.twig', array("cathegories" => $cathegories));
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

    public function monprofilAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_ADMIN')) {
            $utilisateur = $em->getRepository('AdminBundle:Admin')->findOneBy(array('User' => $user));
            return $this->render('AdminBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
        } elseif ($user->hasRole('ROLE_ENTREPRISE')) {
            $utilisateur = $em->getRepository('EntrepriseBundle:Entreprise')->findOneBy(array('User' => $user));
            return $this->render('EntrepriseBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
        } elseif ($user->hasRole('ROLE_USER')) {
            $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('User' => $user));
            return $this->render('FrontBundle:Default:monprofil.html.twig', array('user' => $utilisateur));
        }
    }

    public function AddActiviteAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $categorie = $em->getRepository('AdminBundle:ActivityCath')->find($request->get('idCategorie'));

        $Activite = new Activity();
        $Activite->setNom($request->get('actNom'));
        $Activite->setDescription($request->get('actDescription'));
        $Activite->setActivation($request->get('actActivation'));
        $Activite->setImg($request->get("actImage"));
        $Activite->setdat_deb(date_create(date('Y-m-d', strtotime($request->get("actDatedebut")))));
        $Activite->setdat_fin(date_create(date('Y-m-d', strtotime($request->get("actDatefin")))));
        $Activite->setNbrPoint($request->get("actNbrpoint"));
        $Activite->setExperience($request->get("actexp"));
        $Activite->setCategorie($categorie);
        $Activite->setStatus("Nouveau");

        if ($request->get('actActivation') == "1") {
            $categorie->setActivation("1");
            $categorie->setStatus("Activer");
        }
        $categorie->setNbrAct($categorie->getNbrAct() + 1);
        $em->persist($Activite);

        $em->flush();

        return new Response();
    }

    public function DeleteActiviteAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Activite = $em->getRepository('AdminBundle:Activity')->find($id);

        $Activite->setStatus("Deleted");
        $Activite->setActivation("0");

        $em->persist($Activite);

        $em->flush();

        return new Response();
    }

    public function ActivationActiviteAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Activite = $em->getRepository('AdminBundle:Activity')->find($id);
        if ($Activite->getActivation() == "0") {
            $Activite->setActivation("1");
            $Activite->setStatus("Activer");
        } else {
            $Activite->setActivation("0");
            $Activite->setStatus("Desactiver");
        }
        $em->persist($Activite);

        $em->flush();

        return new Response();
    }

    public function EditActiviteAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Activite = $em->getRepository('AdminBundle:Activity')->find($id);

        $Activite->setNom($request->get('actNom'));
        $Activite->setDescription($request->get('actDescription'));
        $Activite->setActivation($request->get('actActivation'));
        $Activite->setImg($request->get("actImage"));
        $Activite->setdat_deb(date_create(date('Y-m-d', strtotime($request->get("actDatedebut")))));
        $Activite->setdat_fin(date_create(date('Y-m-d', strtotime($request->get("actDatefin")))));
        $Activite->setNbrPoint($request->get("actNbrpoint"));
        $Activite->setExperience($request->get("actexp"));


        if ($request->get("actActivation") == "0") {
            $Activite->setStatus("Desactiver");
        } else {
            $Activite->setStatus("Activer");
        }

        $em->flush();

        return new Response();
    }

    public function AddProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $Produit = new Produits();
        $Produit->setLibele($request->get('LibeleProduit'));
        $Produit->setDescription($request->get('DescriptionProduit'));
        $Produit->setNbrCoin($request->get('NbrPointProduit'));
        $Produit->setStock($request->get("StockProduit"));
        $Produit->setPrix($request->get("PrixProduit"));
        $Produit->setImage($request->get("ImageProduit"));
        if ($request->get("StockProduit") == 0){
            $Produit->setStatus("Stock epuiser");
        }
        else{
            $Produit->setStatus("Nouveau");
        }


        $em->persist($Produit);

        $em->flush();

        return new Response();
    }

    public function DeleteProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);

        $Produit->setStatus("Deleted");

        $em->persist($Produit);
        $em->flush();

        return new Response();
    }
    
     public function EditStockProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('idProduit');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);

        $type = $request->get('Type');
        $QuantiteProduit = $request->get('QuantiteProduit');
        if ($type =='ajouter'){
            $Produit->setStock($Produit->getStock()+$QuantiteProduit);
            $Produit->setStatus("Activer");
        }
        elseif ($type =='deminuer'){
            if ($Produit->getStock()-$QuantiteProduit == 0){
                $Produit->setStatus("Stock epuiser");
            }
            $Produit->setStock($Produit->getStock()-$QuantiteProduit);
        }
        


        $em->flush();

        return new Response();
    }

     public function EditProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);

        $Produit->setLibele($request->get('LibeleProduit'));
        $Produit->setDescription($request->get('DescriptionProduit'));
        $Produit->setNbrCoin($request->get('NbrPointProduit'));
        $Produit->setStock($request->get("StockProduit"));
        $Produit->setPrix($request->get("PrixProduit"));
        $Produit->setImage($request->get("ImageProduit"));
         if ($request->get("StockProduit") == 0){
                $Produit->setStatus("Stock epuiser");
            }
            else{
            $Produit->setStatus("Activer");
            }

        $em->flush();

        return new Response();
    }
    
     public function AcheterProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('idProduit');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);
        
         if ($Produit->getStock()-1 == 0){
                $Produit->setStatus("Stock epuiser");
            }
        $Produit->setStock($Produit->getStock()-1);
     
        $em->flush();

        return new Response();
    }
}

?>