<?php

namespace SupAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\ActivityCath;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('SupAdminBundle:Default:index.html.twig');
    }

    public function categoriesAction() {
        $em = $this->getDoctrine()->getManager();
        $cathegories = $em->getRepository('AdminBundle:ActivityCath')->findall();
        return $this->render('SupAdminBundle:Default:categories.html.twig', array("cathegories" => $cathegories));
    }

    public function AddCategorieAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');

        $Categorie = new ActivityCath();
        $Categorie->setLibelle($request->get('catlibelle'));
        $Categorie->setDescription($request->get('catdescription'));
        $Categorie->setActivation($request->get('catactivation'));
        $Categorie->setImg($request->get("catimage"));
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

        $id = $request->get('id');
        $Categorie = $em->getRepository('AdminBundle:ActivityCath')->find($id);

        $Categorie->setLibelle($request->get('catlibelle'));
        $Categorie->setDescription($request->get('catdescription'));
        $Categorie->setActivation($request->get('catactivation'));
        $Categorie->setImg($request->get("catimage"));
        if ($request->get("catactivation") == "0") {
            $Categorie->setStatus("Desactiver");
        } else {
            $Categorie->setStatus("Activer");
        }

        $em->flush();

        return new Response();
    }

}
