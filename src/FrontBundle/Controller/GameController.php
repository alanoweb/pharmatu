<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller {

    public function Master2048Action() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request');
        // $request->get('score')
        // $request->get('Bestscore')
        //$request->get('Status')
        if ((!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) && (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED'))) {
            // authenticated REMEMBERED, FULLY will imply REMEMBERED (NON anonymous)
            if ($request->get('Status') == 'lost') {
                $this->get('session')->set('Anon_coins', $this->get('session')->get('Anon_coins') + 1);
                $this->get('session')->set('Anon_Exp', $this->get('session')->get('Anon_Exp') + 5);
            } elseif ($request->get('Status') == 'won') {
                $this->get('session')->set('Anon_coins', $this->get('session')->get('Anon_coins') + 10);
                $this->get('session')->set('Anon_Exp', $this->get('session')->get('Anon_Exp') + 50);
            }

            $res = 'anon,' . $this->get('session')->get('Anon_coins') . ',' . $this->get('session')->get('Anon_Exp');
        } else {
            $user = $this->get('security.context')->getToken()->getUser();
            if (!($user->hasRole('ROLE_SUPER_ADMIN')) && !($user->hasRole('ROLE_ADMIN')) && !($user->hasRole('ROLE_ENTREPRISE')) && ($user->hasRole('ROLE_USER'))) {
                $utilisateur = $em->getRepository('FrontBundle:Utilisateur')->findOneBy(array('user' => $user));
                if ($request->get('Status') == 'lost') {
                    $utilisateur->setCoin($utilisateur->getCoin()+1);
                    $utilisateur->setExperience($utilisateur->getExperience()+5);
                } elseif ($request->get('Status') == 'won') {
                    $utilisateur->setCoin($utilisateur->getCoin()+10);
                    $utilisateur->setExperience($utilisateur->getExperience()+50);
                }
                $em->flush();
                $res = 'loggedin,' . $utilisateur->getCoin() . ',' . $utilisateur->getExperience();
            }
            else { $res = 'loggedin,' . 'notuser'  ;}
        }
        return new Response($res);
    }

}

?>