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

   
}

?>