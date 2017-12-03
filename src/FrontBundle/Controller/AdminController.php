<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Activity;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\Produits;

class AdminController extends Controller {
    
    public function AddActiviteAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $categorie = $em->getRepository('AdminBundle:ActivityCath')->find($request->get('AddCategorieid'));

        $Activite = new Activity();
        $Activite->setNom($request->get('NomAct'));
        $Activite->setDescription($request->get('DescriptionAct'));
        $Activite->setActivation($request->get('activationAct'));
        $file = $request->files->get('ImageAct');
       if (isset($file)){
           $fileName = md5($Activite->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/activity';
           $file->move($photoDir, $fileName);
           $Activite->setImg('img/activity/'.$fileName);
       }
        $Activite->setdat_deb(date_create(date('Y-m-d', strtotime($request->get("DateDebutAct")))));
        $Activite->setdat_fin(date_create(date('Y-m-d', strtotime($request->get("DateFinAct")))));
        $Activite->setNbrPoint($request->get("NbrPointAct"));
        $Activite->setExperience($request->get("ExpAct"));
        $Activite->setCategorie($categorie);
        $Activite->setStatus("Nouveau");

        if ($request->get('activationAct') == "1") {
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

        $id = $request->get('EditActivityid');
        $Activite = $em->getRepository('AdminBundle:Activity')->find($id);

        $Activite->setNom($request->get('EditNomAct'));
        $Activite->setDescription($request->get('EditDescriptionAct'));
        $Activite->setActivation($request->get('EditactivationAct'));
        $file = $request->files->get('EditImageAct');
       if (isset($file)){
           $fileName = md5($id).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/activity';
           $file->move($photoDir, $fileName);
           $Activite->setImg('img/activity/'.$fileName);
       }
        $Activite->setdat_deb(date_create(date('Y-m-d', strtotime($request->get("EditDateDebutAct")))));
        $Activite->setdat_fin(date_create(date('Y-m-d', strtotime($request->get("EditDateFinAct")))));
        $Activite->setNbrPoint($request->get("EditNbrPointAct"));
        $Activite->setExperience($request->get("EditExpAct"));


        if ($request->get("EditactivationAct") == "0") {
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
        $file = $request->files->get('ImageProduit');
       if (isset($file)){
           $fileName = md5($Produit->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/produits';
           $file->move($photoDir, $fileName);
           $Produit->setImage('img/produits/'.$fileName);
       }
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

        $id = $request->get('EditProduitid');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);

        $Produit->setLibele($request->get('EditLibeleProduit'));
        $Produit->setDescription($request->get('EditDescriptionProduit'));
        $Produit->setNbrCoin($request->get('EditNbrPointProduit'));
        $Produit->setStock($request->get("EditStockProduit"));
        $Produit->setPrix($request->get("EditPrixProduit"));
        $file = $request->files->get('EditImageProduit');
       if (isset($file)){
           $fileName = md5($id).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/produits';
           $file->move($photoDir, $fileName);
           $Produit->setImage('img/produits/'.$fileName);
       }
         if ($request->get("EditStockProduit") == 0){
                $Produit->setStatus("Stock epuiser");
            }
            else{
            $Produit->setStatus("Activer");
            }

        $em->flush();

        return new Response();
    }

}
?>