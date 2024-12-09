<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class MesureController extends AbstractController
{
    #[Route('/mesure', name: 'app_mesure')]
    public function index(Request $request): Response
    {
        $request = Request::createFromGlobals();
        $type = $request->get('type'); 

        $session = new Session();
        $session->set('type', $type);
        return $this->render('mesure/index.html.twig',);
    }
}



