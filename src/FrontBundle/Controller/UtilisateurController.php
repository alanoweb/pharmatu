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
        $user = $request->get('Personnalid');
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($user);

        $utilisateur->setNom($request->get('Personnalnom'));
        $utilisateur->setPrenom($request->get('Personnalprenom'));
        $utilisateur->setAdresse($request->get('Personnaladresse'));
        $utilisateur->setNumero($request->get('Personnalnum'));
        $utilisateur->setPseudo($request->get('Personnalpseudo'));
        $utilisateur->setCin($request->get('Personnalcin'));
        $utilisateur->setDatavalider('true');
        $utilisateur->setDate_nais(date_create(date('Y-m-d', strtotime($request->get("Personnaldatenais")))));
     
        $em->flush();

        return new Response();
    }
    
    public function SaveGeneralDataAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('Generalid');
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($user);
        $utilisateur->setSexe($request->get('Generalsexe'));
        $utilisateur->setMetier($request->get('Generalmetier'));
        $utilisateur->setLieutravail($request->get('Generallieutravail'));
        $utilisateur->setNiveauscolaire($request->get('Generalniveauscolaire'));
        $utilisateur->setDiplome($request->get('Generaldiplome'));
        $utilisateur->setPays($request->get('Generalpays'));
        $utilisateur->setSituation($request->get("Generalsituation"));
        $utilisateur->setSiteweb($request->get("Generalsiteweb"));
        $utilisateur->setLangues($request->get("Generallangues"));
        $utilisateur->setDescription($request->get("Generaldescription"));
     
        $em->flush();

        return new Response();
    }

   
}

?>