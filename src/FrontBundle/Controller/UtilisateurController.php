<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Activity;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\Produits;

class UtilisateurController extends Controller {

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
    
    public function SavePersonnalDataAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $this->get('security.context')->getToken()->getUser();
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('user' => $user));

        $utilisateur->setNom($request->get('Personnalnom'));
        $utilisateur->setPrenom($request->get('Personnalprenom'));
        $utilisateur->setAdresse($request->get('Personnaladresse'));
        $utilisateur->setNumero($request->get('Personnalnum'));
        $utilisateur->setPseudo($request->get('Personnalpseudo'));
        $utilisateur->setCin($request->get('Personnalcin'));
        $utilisateur->setDate_nais(date_create(date('Y-m-d', strtotime($request->get("Personnaldatenais")))));
     
        $em->flush();

        return new Response();
    }

   
}

?>