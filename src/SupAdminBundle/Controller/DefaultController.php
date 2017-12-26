<?php

namespace SupAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\ActivityCath;
use Symfony\Component\HttpFoundation\Response;
use SupAdminBundle\Entity\levels;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('SupAdminBundle:Default:index.html.twig');
    }

    public function categoriesAction() {
        $em = $this->getDoctrine()->getManager();
        $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('SupAdminBundle:Default:categories.html.twig', array("cathegories" => $cathegories));
    }
    public function MaxlevelsAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        $max = $request->get('nombremaxlevel');
        $connection = $em->getConnection();
        $platform = $connection->getDatabasePlatform();

        $connection->executeUpdate($platform->getTruncateTableSQL('levels'));


        $x = 128;
            $y = 50;
            for ($i = 1; $i <= $max; $i++) {
                $y = $y + 5 + floor($i/10);
                $level = new levels();
                $level->setExperience(round($x));
                $level->setGainCoin($y);
                $em->persist($level);
                if ($i < 25)
                $x = $x * 1.3;
                if ($i >= 25 && $i < 50)
                $x = $x * 1.2;
                if ($i >= 50 && $i < 75)
                $x = $x * 1.1;
                if ($i >= 75 && $i <100 )
                $x = $x * 1.05;
                if ($i >= 100 )
                $x = $x * 1.03;
            }
            $em->flush();
        return new Response();
    }
    
    public function levelsAction() {
        $em = $this->getDoctrine()->getManager();
        $levels = $em->getRepository('SupAdminBundle:levels')->findall();
        if (!$levels) {
            $x = 128;
            $y = 50;
            for ($i = 1; $i <= 25; $i++) {
                $y = $y + 5 + floor($i/10);
                $level = new levels();
                $level->setExperience(round($x));
                $level->setGainCoin($y);
                $em->persist($level);
                $x = $x * 1.3;
            }
            $em->flush();
            $levels = $em->getRepository('SupAdminBundle:levels')->findall();
        }
        return $this->render('SupAdminBundle:Default:levels.html.twig', array("levels" => $levels,"nombreoflevels"=>count($levels)));
    }

    public function AddCategorieAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $Categorie = new ActivityCath();
        $Categorie->setLibelle($request->get('LibelleCat'));
        $Categorie->setDescription($request->get('DescriptionCat'));
        $Categorie->setActivation($request->get('activation'));
        
        $file = $request->files->get('ImageCat');
       if (isset($file)){
           $fileName = md5($Categorie->getId()).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/categorie';
           $file->move($photoDir, $fileName);
           $Categorie->setImg('img/categorie/'.$fileName);
       }
        $Categorie->setStatus("Nouveau");
        $Categorie->setNbrAct(0);

        $em->persist($Categorie);

        $em->flush();

        return new Response();
    }

    public function DeleteCategorieAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Categorie = $em->getRepository('AdminBundle:ActivityCath')->find($id);

        $Categorie->setStatus("Deleted");
        $Categorie->setActivation("0");

        $em->persist($Categorie);

        $em->flush();

        return new Response();
    }

    public function ActivationCategorieAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $id = $request->get('id');
        $Categorie = $em->getRepository('AdminBundle:ActivityCath')->find($id);
        if ($Categorie->getActivation() == "0") {
            $Categorie->setActivation("1");
            $Categorie->setStatus("Activer");
        } else {
            $Categorie->setActivation("0");
            $Categorie->setStatus("Desactiver");
        }
        $em->persist($Categorie);

        $em->flush();

        return new Response();
    }

    public function EditCategorieAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        
        $id = $request->get('EditCategorieid');
        $Categorie = $em->getRepository('AdminBundle:ActivityCath')->find($id);
        
       $file = $request->files->get('EditImageCat');
       if (isset($file)){
           $fileName = md5($id).'.'.$file->guessExtension();
           $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/img/categorie';
           $file->move($photoDir, $fileName);
           $Categorie->setImg('img/categorie/'.$fileName);
       }
       
        $Categorie->setLibelle($request->get('EditLibelleCat'));
        $Categorie->setDescription($request->get('EditDescriptionCat'));
        $Categorie->setActivation($request->get('Editactivation'));
        
        if ($request->get("Editactivation") == "0") {
            $Categorie->setStatus("Desactiver");
        } else {
            $Categorie->setStatus("Activer");
        }

        $em->flush();

        return new Response();
    }

}
