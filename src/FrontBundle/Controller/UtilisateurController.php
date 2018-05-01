<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Activity;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\Produits;
use Symfony\Component\HttpFoundation\JsonResponse;

class UtilisateurController extends Controller {

    public function AcheterProduitAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('idProduit');
        $Produit = $em->getRepository('SupAdminBundle:Produits')->find($id);
        if ($this->getUser()->getUtilisateur()->getCoin() - $Produit->getNbrCoin() >= 0){
            if ($Produit->getStock()-1 == 0){
                   $Produit->setStatus("Stock epuiser");
               }
           $Produit->setStock($Produit->getStock()-1);
           $this->getUser()->getUtilisateur()->setCoin($this->getUser()->getUtilisateur()->getCoin() - $Produit->getNbrCoin());

           $em->flush();

           return new Response('ok');
        }
        else{
            return new Response('pb');
        }
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
    
    public function EditImgProfilAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photoprofilid');
         $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($user);
        $file = $request->files->get('photoprofil');
       if (isset($file)){
           $fileName = md5($user.'photo').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/user/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImageprofil('img/user/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
    
    public function EditImgCouvertureAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $user = $request->get('photocouvertureid');
         $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->find($user);
        $file = $request->files->get('photocouverture');
       if (isset($file)){
           $fileName = md5($user.'couverture').'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/user/'.md5($user).'/';
           $file->move($photoDir, $fileName);
           $utilisateur->setImagecouverture('img/user/'.md5($user).'/'.$fileName);
       }
        $em->flush();

        return new Response();
    }
    
    public function journalShowMoreAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        
        $user = $this->get('security.context')->getToken()->getUser();
        $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('user' => $user));
        
        $journals = $em->getRepository('FrontBundle:Journal')->findBy(array('utilisateur' => $utilisateur),array('date' => 'DESC'));
        
        if(count($journals) == $request->get('last')){
            return new JsonResponse('all');
        }else{
            $journal = array();
            foreach( $journals as $key => $elem){
                if($key < ($request->get('last') + 3)){
                    $journal[$key]['title'] = $elem->getTitle();
                    $journal[$key]['date'] = $elem->getDate();
                    $journal[$key]['image'] = $elem->getImage();
                    $journal[$key]['description'] = $elem->getDescription();
                }
            }
            return new JsonResponse($journal);
        }
    }
       
}

?>